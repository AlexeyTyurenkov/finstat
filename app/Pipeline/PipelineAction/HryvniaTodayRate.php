<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/1/18
 * Time: 11:04 PM
 */

namespace app\Pipeline\PipelineAction;

use App\BuySellRate;
abstract class HryvniaTodayRate implements IPipelineAction
{
    /**
     * @return String title
     */
    function title()
    {
        return "Look for ".$this->key." rates";
    }

    /**
     * @return Array Result
     */
    function run(array $params, &$stop)
    {
        $json = $params['json'];
        $rates = $params['rates'];
        $data = $json['data'];
        foreach ($data as $key=>$value)
        {
            if (!isset($value[$this->key]))
            {
                continue;
            }
            $rate = $value[$this->key];
            $model = BuySellRate::firstOrNew(
                ['cc'=> $key, 'type'=> $this->code,'day'=> now()->format('Y-m-d')]
            );
            $model->buy = data_get($rate,"buy.value");
            $model->buychange = data_get($rate,"buy.diff");
            $model->sale = data_get($rate,"sale.value");
            $model->salechange = data_get($rate,"sale.diff");
            $model->save();
        }
        return ['rates'=> $rates];
    }
}