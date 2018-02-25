<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/24/18
 * Time: 9:21 PM
 */


namespace App\Pipeline\PipelineAction;
use Zip;

class UnzipDownloadedFile implements IPipelineAction
{
    /**
     * @return String title
     */
    function title()
    {
        return "Unpuck zip file ";
    }

    /**
     * @return Array Result
     */
    function run(array $params, &$stop)
    {
        if (is_array($params) && isset($params['file']))
        {
            $file = $params['file'];
            $zip = Zip::open($file);
            $zip->extract(sys_get_temp_dir());
            $list = array_map(function($item){
                return sys_get_temp_dir()."/".$item;
            }, $zip->listFiles() );
            unlink($file);

            return ['downloadedfiles'=>$list];
        }
        else
        {
            $stop = true;
            return null;
        }
    }

}