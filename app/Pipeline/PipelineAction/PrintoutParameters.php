<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/1/18
 * Time: 9:27 PM
 */

namespace App\Pipeline\PipelineAction;


class PrintoutParameters implements IPipelineAction
{
    /**
     * @return String title
     */
    function title()
    {
        return "Looking for filename ";
    }

    /**
     * @return Array Result
     */
    function run(array $params, &$stop)
    {
        var_dump($params);
        $stop = true;
        return $params;
    }

    /**
     * PipelineAction constructor.
     * @param params Array of params
     */
    public function __construct()
    {

    }
}