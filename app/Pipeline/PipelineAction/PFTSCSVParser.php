<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/9/18
 * Time: 10:37 PM
 */

namespace App\Pipeline\PipelineAction;


class PFTSCSVParser implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Parsing CSV with current PFTS index value";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        if(!isset($params['csv']))
        {
            $stop = true;
            return [];
        }
        $csv = $params['csv'];
        $array = explode("\n",$csv);
        $data = str_getcsv($array[1],";");
        return ['data'=>$data];
    }
}