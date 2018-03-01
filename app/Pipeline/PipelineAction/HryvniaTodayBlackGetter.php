<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/1/18
 * Time: 9:39 PM
 */

namespace App\Pipeline\PipelineAction;


use App\BuySellRate;


class HryvniaTodayBlackGetter extends HryvniaTodayRate
{

    protected $code = BuySellRate::BLACK;
    protected $key = 'black';
}