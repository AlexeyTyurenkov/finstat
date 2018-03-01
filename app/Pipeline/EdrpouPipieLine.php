<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/23/18
 * Time: 8:58 AM
 */
namespace App\Pipeline;
use App\Pipeline\PipelineAction\IPipelineAction;


use Illuminate\Support\Collection;


class EdrpouPipieLine
{




    function  run($pipeline, $param)
    {
        echo "Pipeline has been started.\n";
        if (isset($pipeline)) {
            $pipelineCollection = collect($pipeline);
            $stop = false;
            if (!isset($param))
            {
                $param = array();
            }
            $pipelineCollection->reduce(
            /**
             * @param Array $nextParameters Parameters which got from the previous pipeline action, could be flexible result
             * @param IPipelineAction $action Class which is responsible for next piplene action
             * @return
             */
                function(array $nextParameters,IPipelineAction $action) use (&$stop){
                if (!$stop)
                {
                    echo $action->title()." started\n";
                    try {
                        $result = $action->run($nextParameters, $stop);
                    }
                    catch (PipelineException $exception)
                    {
                        echo $action->title()." throws an error:\n";
                        echo $exception->getMessage()."\n";
                    }
                    echo $action->title()." finished\n";
                    $result = array_merge($nextParameters,$result);
                    return $result;
                }
                else
                {
                    echo $action->title()." skipped!\n";
                }
                return null;
            }, $param);

        }
        else
        {
            echo "Pipeline is empty!\n";
        }
        echo "Pipeline has been finished.\n";



    }
}