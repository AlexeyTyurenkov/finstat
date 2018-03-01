<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/1/18
 * Time: 9:21 PM
 */

namespace App\Pipeline\PipelineAction;


use GuzzleHttp\Client;
class HryvniaTodayDownloader implements IPipelineAction
{


    /*
{
  "status": "success",
  "data": [
    {
      "id": 124,
      "code": "CAD",
      "title": "Канадський долар",
      "verbal": "канадійський долар",
      "symbol": "C$"
    },
    {
      "id": 392,
      "code": "JPY",
      "title": "Японська єна",
      "verbal": "єна",
      "symbol": "¥"
    },
    {
      "id": 643,
      "code": "RUB",
      "title": "Російський рубль",
      "verbal": "рубль",
      "symbol": "₽"
    },
    {
      "id": 756,
      "code": "CHF",
      "title": "Швейцарський франк",
      "verbal": "франк",
      "symbol": "₣"
    },
    {
      "id": 826,
      "code": "GBP",
      "title": "Англійський фунт стерлінгів",
      "verbal": "фунт",
      "symbol": "£"
    },
    {
      "id": 840,
      "code": "USD",
      "title": "Долар США",
      "verbal": "долар",
      "symbol": "$"
    },
    {
      "id": 978,
      "code": "EUR",
      "title": "Євро",
      "verbal": "євро",
      "symbol": "€"
    },
    {
      "id": 980,
      "code": "UAH",
      "title": "Гривня",
      "verbal": "гривня",
      "symbol": "₴"
    },
    {
      "id": 985,
      "code": "PLN",
      "title": "Польський злотий",
      "verbal": "злотий",
      "symbol": "zł"
    }
  ]
}
*/
    /**
     * @return String title
     */
    function title()
    {
        return "Download JSON from Hryvnia Today";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $client = new Client(
            ['base_uri' => 'https://hryvna-today.p.mashape.com/v1/rates/']
        );
        $response = $client->get('today',["headers"=>["X-Mashape-Key" => $params['htkey'],
            "Accept" => "application/json"]]);
        return ["json"=> json_decode($response->getBody(), true),
            "rates"=>array()];
    }
}