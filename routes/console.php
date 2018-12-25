<?php

use Illuminate\Foundation\Inspiring;
use App\Pipeline\EdrpouPipieLine;
use App\Pipeline\PipelineAction\ParseJSONAndFoundField;
use App\Pipeline\PipelineAction\DownloadZipFile;
use App\Pipeline\PipelineAction\UnzipDownloadedFile;
use \App\Pipeline\PipelineAction\GetDataPassport;
use App\Pipeline\PipelineAction\XMLDataReader;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('edrpou', function () {
    $pipeline = new EdrpouPipieLine();
    $this->comment($pipeline->run([new GetDataPassport(),
        new ParseJSONAndFoundField(),
        new DownloadZipFile(),
        new UnzipDownloadedFile(),
        new XMLDataReader()], null));
})->describe('EDRPOU database pipeline');


Artisan::command('xmlparse', function () {
    $pipeline = new EdrpouPipieLine();
    //'/tmp/15.1-EX_XML_EDR_UO.xml',
    $this->comment($pipeline->run([new \App\Pipeline\PipelineAction\XMLDataReader()], ['downloadedfiles'=>['/tmp/15.2-EX_XML_EDR_FOP.xml']]));
})->describe('EDRPOU database pipeline');


Artisan::command('hryvnatoday', function () {
    $pipeline = new EdrpouPipieLine();
    $this->comment($pipeline->run([new App\Pipeline\PipelineAction\HryvniaTodayDownloader(),
        new App\Pipeline\PipelineAction\HryvniaTodayCommercialGetter(),
new App\Pipeline\PipelineAction\HryvniaTodayInterbankGetter(),
new App\Pipeline\PipelineAction\HryvniaTodayBlackGetter(),
//        new App\Pipeline\PipelineAction\PrintoutParameters(),
        ], ['htkey'=>env('HT_KEY',"")]));
})->describe('Hryvnia Today Pipeline');

Artisan::command('uxindex', function () {
    $pipeline = new EdrpouPipieLine();
    $this->comment($pipeline->run( [new App\Pipeline\PipelineAction\UXMainIndexDownloader(),
        new App\Pipeline\PipelineAction\UXXMLParser(),
        new App\Pipeline\PipelineAction\UXXMLDataSaver(),
    ], []));
})->describe('UX Index Pipeline');

Artisan::command('pftsindex', function () {
    $pipeline = new EdrpouPipieLine();
    $this->comment($pipeline->run( [new App\Pipeline\PipelineAction\PFTSIndexDownloader(),
        new App\Pipeline\PipelineAction\PFTSCSVParser(),
        new App\Pipeline\PipelineAction\PFTSIndexSaver()
    ], ['date'=>date('Y-m-d')]));
})->describe('PFTS Index Pipeline');

Artisan::command('minfinmb', function () {
    $pipeline = new EdrpouPipieLine();
    $this->comment($pipeline->run( [new App\Pipeline\PipelineAction\MinfinMBDownloader(),
        new App\Pipeline\PipelineAction\MinfinMBParser()
    ], ["date" => "",
        'mfkey'=>env('MF_KEY',"")]));
    /*['date'=>date('Y-m-d')]*/
})->describe('Min Fin Interbank Pipeline');

Artisan::command('minfinva', function () {
    $pipeline = new EdrpouPipieLine();
    $this->comment($pipeline->run( [new App\Pipeline\PipelineAction\MinfinVADownLoader(),
        new App\Pipeline\PipelineAction\MinfinVAParser()
    ], ['mfkey'=>env('MF_KEY',"")]));
    /*['date'=>date('Y-m-d')]*/
})->describe('Min Fin Interbank Pipeline');