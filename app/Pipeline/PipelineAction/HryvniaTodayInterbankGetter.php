<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/1/18
 * Time: 9:39 PM
 */

namespace App\Pipeline\PipelineAction;


use App\BuySellRate;


class HryvniaTodayInterbankGetter extends HryvniaTodayRate
{

    protected $code = BuySellRate::INTERBANK;
    protected $key = 'interbank';
}