<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/23/18
 * Time: 9:19 AM
 */

namespace App\Pipeline\PipelineAction;

interface IPipelineAction
{

    /**
     * @return String title
     */
    function title();

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop);


}