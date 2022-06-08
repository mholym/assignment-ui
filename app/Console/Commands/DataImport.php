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
        $html = HtmlDomParser::file_get_html('https://www.e-obce.sk/', false, null, 0);
        echo $html;
        return 0;
    }
}
