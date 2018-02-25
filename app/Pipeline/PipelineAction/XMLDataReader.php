<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/24/18
 * Time: 11:50 PM
 */

namespace App\Pipeline\PipelineAction;

use App\Parser\EdrpouDataParser;

class XMLDataReader implements IPipelineAction
{
    /**
     * @return String title
     */
    function title()
    {
        return "Put records to the database file ";
    }

    /**
     * @return Array Result
     */
    function run(array $params, &$stop)
    {
        if (is_array($params) && isset($params['downloadedfiles']))
        {
            $filelist = collect($params['downloadedfiles']);
            $filelist->each(function($file){
                $reader = new EdrpouDataParser();
                $reader->readFile($file);
                unlink($file);
            });
            return null;
        }
        else
        {
            $stop = true;
            return null;
        }
    }

}