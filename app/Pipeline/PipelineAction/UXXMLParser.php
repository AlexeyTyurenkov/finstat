<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 3/4/18
 * Time: 11:29 PM
 */

namespace App\Pipeline\PipelineAction;

use XmlParser;
class UXXMLParser implements IPipelineAction
{

    /**
     * @return String title
     */
    function title()
    {
        return "Parsing XML with current Ukrainian eXchange index value";
    }

    /**
     * @return Array Result
     */
    function run(Array $params, &$stop)
    {
        if(!isset($params['xml']))
        {
            $stop = true;
            return [];
        }
        $xml = XmlParser::extract($params['xml']);
        $data = $xml->parse(['moment'=>['uses'=>'indices.index::moment'],
            'open'=>['uses'=>'indices.index::open'],
            'max'=>['uses'=>'indices.index::max'],
            'min'=>['uses'=>'indices.index::min'],
            'close'=>['uses'=>'indices.index::close'],
            'prev'=>['uses'=>'indices.index::prev'],
            'open_change'=>['uses'=>'indices.index::open_change'],
            'prev_change'=>['uses'=>'indices.index::prev_change'],
            'volume'=>['uses'=>'indices.index::volume'],
            ]);
        return ['data'=>$data];
    }
}