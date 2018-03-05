<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/5/18
 * Time: 8:43 AM
 */

namespace App\Pipeline\PipelineAction;

use App\UxIndexCurrent;

class UXXMLDataSaver implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Saving current UX data to the Database";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        if(!isset($params['data']))
        {
            $stop = true;
            return [];
        }
        $data = $params['data'];
        $model = UxIndexCurrent::firstOrNew(['id' => 1]);
        $model->open = $data["open"];
        $model->close = $data["close"];
        $model->max = $data["max"];
        $model->min = $data["min"];
        $model->prev = $data["prev"];
        $model->openchange = $data["open_change"];
        $model->prevchange = $data["prev_change"];
        $model->volume = $data["volume"];
        $model->moment = $data["moment"];
        $model->save();
        return ['model'=>$model];
    }
}