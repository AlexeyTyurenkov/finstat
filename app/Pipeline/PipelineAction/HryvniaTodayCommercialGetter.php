<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/1/18
 * Time: 9:39 PM
 */

namespace App\Pipeline\PipelineAction;


use App\BuySellRate;


class HryvniaTodayCommercialGetter extends HryvniaTodayRate
{

    protected $code = BuySellRate::COMMERCIAL;
    protected $key = 'commercial';
}