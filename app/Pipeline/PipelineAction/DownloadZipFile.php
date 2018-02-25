<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/23/18
 * Time: 11:19 PM
 */

namespace App\Pipeline\PipelineAction;
use GuzzleHttp\Client;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DownloadZipFile implements IPipelineAction
{
    /**
     * @return String title
     */
    function title()
    {
        return "Download zip file ";
    }

    /**
     * @return Array Result
     */
    function run(array $params, &$stop)
    {
        if (is_array($params) && isset($params['file']))
        {
            $file = $params['file'];
            $tmpFile = tempnam(sys_get_temp_dir(), 'tmp.zip');
            $handle = fopen($tmpFile, 'w');
            $client = new Client();
            $client->get($file,['sink'=>$handle]);
            if (is_resource($handle)) {
             fclose($handle);
            }
            return ['file'=>$tmpFile];
        }
        else
        {
            $stop = true;
            return null;
        }
    }

}