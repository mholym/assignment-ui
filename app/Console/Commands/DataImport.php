<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nette\Utils\Html;
use Sunra\PhpSimple\HtmlDomParser;
use App\Models\City;

class DataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses e-obce.sk and saves parsed data to database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pages = [0, 500, 1000, 1500, 2000, 2500];
        $links = [];
        foreach ($pages as $page) {
            $html = HtmlDomParser::file_get_html('https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana='.$page, false, null, 0);
            $html = $html->find('a[href^=https://www.e-obce.sk/obec/]');
            foreach ($html as $element)
                $links[] = $element->href;
        }
        // tu som to fakt nevedel krajsie ucesat, kod na kokod
        foreach ($links as $link) {
            $html = HtmlDomParser::file_get_html($link, false, null, 0);
            $body = $html->find('#telo > table', 1)->find('table > tbody > tr > td', 2);

            $city = array();
            $table = $html->find('td > table > tbody > tr > td > table', 10);
            $table_2 = $html->find('td > table > tbody > tr > td > table', 7);

            $city_name = $table_2->find('h1', 0)->innertext();
            if (strcmp((substr($city_name, 0, 4)), 'Obec') == 0) {
                $city_name = substr($city_name, 4);
            } else if (strcmp((substr($city_name, 0, 5)), 'Mesto') == 0) {
                $city_name = substr($city_name, 5);
            }
            echo utf8_encode(strip_tags($city_name)) . PHP_EOL;
            $city['name'] = utf8_encode(strip_tags($city_name)); // nazov obce
            $city['phone'] = trim($table_2->find('td', 8)->innertext()); // telefonne cislo
            $city['city_hall_address'] = utf8_encode(trim($table_2->find('td', 12)->innertext())); // adresa
            $city['mayor_name'] = utf8_encode(trim($table->find('td', 16)->innertext())); // meno starostu
            if ($table_2->find('td', 17)->find('a', 0) === NULL) { // web tam nemusi byt, najprv kontrola
                $city['web_address'] = NULL;
            } else {
                $city['web_address'] = trim($table_2->find('td', 17)->find('a', 0)->innertext()); // web
            }
            if (trim($table_2->find('td', 14)->find('a', 0) === NULL)) { // mail tam nemusi byt, najprv kontrola
                $city['email'] = NULL;
            } else {
                $city['email'] = trim($table_2->find('td', 14)->find('a', 0)->innertext()); // email
            }
            if (strcmp(trim($table_2->find('div', 1)->innertext()), 'Fax:') == 0) { // fax tam nemusi byt, najprv kontrola
                $city['fax'] = trim($table_2->find('td', 11)->innertext()); // fax
            } else {
                $city['fax'] = NULL;
            }

            // najprv sa pokusim produkt najst podla kombinacie meno obce/starostu
            // ak existuje, tak update, ak neexistuje, tak create
            $query = City::query();
            $record = $query->where('name', $city['name'])->where('mayor_name', $city['mayor_name'])->first();

            if ($record === null) {
                City::create(['web_address' => $city['web_address'],
                    'name' => $city['name'],
                    'phone' => $city['phone'],
                    'email' => $city['email'],
                    'city_hall_address' => $city['city_hall_address'],
                    'mayor_name' => $city['mayor_name'],
                    'fax' => $city['fax']]);
            } else {
                $record->name = $city['name'];
                $record->web_address = $city['web_address'];
                $record->phone = $city['phone'];
                $record->email = $city['email'];
                $record->city_hall_address = $city['city_hall_address'];
                $record->mayor_name = $city['mayor_name'];
                $record->fax = $city['fax'];
                $record->save();
            }
        }

        return 0;
    }
}
