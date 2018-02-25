<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/23/18
 * Time: 8:02 PM
 */
namespace App\Pipeline\PipelineAction;


use GuzzleHttp\Client;

class GetDataPassport implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Download Data passport ";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $client = new Client(
            ['base_uri' => 'data.gov.ua/view-dataset/']
        );
        $response = $client->get('dataset.json',['query'=>['dataset-id'=> '73cfe78e-89ef-4f06-b3ab-eb5f16aea237',
                                                                'tick' => bin2hex(random_bytes(10))]]);
        return ["json"=> $response->getBody(),
        "xpath"=>"files.0.url"];
    }


}