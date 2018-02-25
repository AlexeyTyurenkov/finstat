<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/23/18
 * Time: 8:02 PM
 */
namespace App\Pipeline\PipelineAction;




class ParseJSONAndFoundField implements IPipelineAction
{
    /**
     * @return String title
     */
    function title()
    {
        return "Looking for filename ";
    }

    /**
     * @return Array Result
     */
    function run(array $params, &$stop)
    {
        $json = $params['json'];
        $xpath = $params['xpath'];
        $document = json_decode($json, true);
        return ['file' => data_get($document,$xpath)];
    }

    /**
     * PipelineAction constructor.
     * @param params Array of params
     */
    public function __construct()
    {

    }
}