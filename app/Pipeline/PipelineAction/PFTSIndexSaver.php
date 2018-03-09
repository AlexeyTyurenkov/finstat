<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/9/18
 * Time: 10:52 PM
 */

namespace App\Pipeline\PipelineAction;
use App\PFTSIndex;


class PFTSIndexSaver implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Saving current PFTS data to the Database";
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
        $model = PFTSIndex::firstOrNew(['id' => 1]);
        $model->current = $data[1];
        $model->previous = $data[2];
        $model->max52 = $data[4];
        $model->min52 = $data[6];
        $model->change = $data[3];
        $model->moment = $data[0];
        $model->save();
        return ['model'=>$model];
    }
}