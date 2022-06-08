<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nette\Utils\Html;
use Sunra\PhpSimple\HtmlDomParser;

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
        // foreach ($links as $link) {
        $link = $links[8];
        $html = HtmlDomParser::file_get_html($link, false, null, 0);
        $body = $html->find('#telo > table', 1)->find('table > tbody > tr > td', 2);
        echo $body;

        // echo $html->find('td > table > tbody > tr > td > table > tbody', 9);
        // $table = $html->find('td > table > tbody > tr > td > table', 10);
        // echo trim($table->find('td', 16)->innertext()); // meno starostu


        // }
            // echo $link . PHP_EOL;

        return 0;
    }
}
