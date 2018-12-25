<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 12/25/18
 * Time: 5:17 PM
 */

namespace App\Pipeline\PipelineAction;
use App\MinfinMB;

class MinfinMBParser implements IPipelineAction
{


    /**
     * @return String title
     */
    function title()
    {
        return "Parse and Save InterBank Rates";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        $json = $params['json'];
        $rates = $params['rates'];
        foreach ($json as $rate)
        {
            $model = MinfinMB::firstOrNew(
                ['id'=> data_get($rate,"id")]
            );
            $model->ask = data_get($rate,"ask");
            $model->bid = data_get($rate,"bid");
            $model->trendAsk = data_get($rate,"trendAsk");
            $model->trendBid = data_get($rate,"trendBid");
            $model->pointDate = data_get($rate,"pointDate");
            $model->date = data_get($rate,"date");
            $model->currency = data_get($rate,"currency");

            $model->save();
        }
        return ['rates'=> $rates];
    }
}