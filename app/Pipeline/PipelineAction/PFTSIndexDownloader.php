<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/9/18
 * Time: 10:11 PM
 */

namespace App\Pipeline\PipelineAction;
use GuzzleHttp\Client;


class PFTSIndexDownloader implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Download CSV from PFTS.UA";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        if (!isset($params['date']))
        {
            $stop = true;
            return [];
        }
        $date = $params['date'];
        $client = new Client(
            ['base_uri' => 'http://webdata.pfts.ua:8084/sitedata/rest/pfts-index/'.$date.'/'.$date.'/']
        );
        $response = $client->get('pfts-index.csv');
        return ["csv"=> $response->getBody()->getContents()];

    }
}