<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 12/25/18
 * Time: 4:48 PM
 */

namespace App\Pipeline\PipelineAction;
use GuzzleHttp\Client;

class MinfinVADownLoader implements IPipelineAction
{


    /**
     * @return String title
     */
    function title()
    {
        return "Download Auktion Rates";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $client = new Client(
            ['base_uri' => 'http://api.minfin.com.ua/auction/info/'.$params['mfkey'].'/']
        );
        $response = $client->get("",["headers"=>[
            "Accept" => "application/json",
            'User-Agent' => "FinstatUkraineApplicationBot/1.0"]]);
        return ["json"=> json_decode($response->getBody(), true),
            "rates"=>array()];
    }
}