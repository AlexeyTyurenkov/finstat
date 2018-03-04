<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/4/18
 * Time: 10:58 PM
 */

namespace App\Pipeline\PipelineAction;

use GuzzleHttp\Client;

class UXMainIndexDownloader implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Download XML from UX.UA";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $client = new Client(
            ['base_uri' => 'http://www.ux.ua/export/xml/']
        );
        $response = $client->get('indices.aspx');
        return ["xml"=> $response->getBody()->getContents()];

    }
}