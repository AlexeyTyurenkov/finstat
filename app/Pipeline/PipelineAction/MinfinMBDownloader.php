<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 12/25/18
 * Time: 4:48 PM
 */

namespace App\Pipeline\PipelineAction;
use GuzzleHttp\Client;

class MinfinMBDownloader implements IPipelineAction
{


    /**
     * @return String title
     */
    function title()
    {
        return "Download InterBank Rates";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $client = new Client(
            ['base_uri' => 'http://api.minfin.com.ua/mb/'.$params['mfkey'].'/']
        );
        $date = $params['date'];
        if (!isset($date)) {
            $date = "";
        }
        $response = $client->get($date,["headers"=>[
            "Accept" => "application/json",
            'User-Agent' => "FinstatUkraineApplicationBot/1.0"]]);
        return ["json"=> json_decode($response->getBody(), true),
            "rates"=>array()];
    }
}