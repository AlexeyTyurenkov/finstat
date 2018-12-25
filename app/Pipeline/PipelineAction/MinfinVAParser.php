<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 12/25/18
 * Time: 5:17 PM
 */

namespace App\Pipeline\PipelineAction;
use App\MinfinVA;

class MinfinVAParser implements IPipelineAction
{


    /**
     * @return String title
     */
    function title()
    {
        return "Parse and Save Auktion Rates";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $json = $params['json'];
        $rates = $params['rates'];
        foreach ($json as $currency => $data)
        {
            $model = new MinfinVA;
            $model->currency = $currency;
            $model->ask = data_get($data,"ask");
            $model->bid = data_get($data,"bid");
            $model->askCount = data_get($data,"askCount");
            $model->bidCount = data_get($data,"bidCount");
            $model->askSum = data_get($data,"askSum");
            $model->bidSum = data_get($data,"bidSum");
            $model->date = new \DateTime('now');

            $model->save();
        }
        return ['rates'=> $rates];
    }
}