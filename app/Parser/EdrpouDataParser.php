<?php
/**
 * Created by PhpStorm.
 * User: alterego4
 * Date: 2/25/18
 * Time: 12:09 AM
 */
namespace App\Parser;
use App\EdrpouRecords;
class EdrpouDataParser
{
    function readFile($file)
    {
        $xml =new \XMLReader();
        $xml->open($file,null,LIBXML_PARSEHUGE);
        $this->parse($xml);
        $xml->close();
    }


    private function parse(\XMLReader $xml)
    {
        $xml->read(); // DataField
        $xml->read(); //First record
//        $counter = 1000;
        do
        {
            if ($xml->localName == 'RECORD')
            {
                $this->parseRecord($xml->readOuterXml());
//                $counter--;
//                if ($counter == 0)
//                {
//                    break;
//                }


            }

        }
        while ($xml->next());
    }

    private function parseRecord($xmlString)
    {
        $xml = new \XMLReader();
        $xml->XML($xmlString);
        $xml->read(); // Read root element
        $edrpouRecord = new EdrpouRecords();
        while($xml->read()) {
            if ($xml->nodeType == \XMLReader::ELEMENT) {
                switch ($xml->localName) {
                    case 'FIO':
                        $edrpouRecord->boss = $xml->readInnerXml();
                        $edrpouRecord->name = $xml->readInnerXml();
                        break;
                    case 'EDRPOU':
                        $edrpouRecord->edrpou = $xml->readInnerXml();
                        break;
                    case 'NAME':
                        $edrpouRecord->name = $xml->readInnerXml();
                        break;
                    case 'KVED':
                        $edrpouRecord->kved = $xml->readInnerXml();
                        break;
                    case 'ADDRESS':
                        $edrpouRecord->address = $xml->readInnerXml();
                        break;
                    case 'STAN':
                        $edrpouRecord->stan = $xml->readInnerXml();
                        break;
                    case 'BOSS':
                        $edrpouRecord->boss = $xml->readInnerXml();
                        break;
                    case 'SHORT_NAME':
                    case 'FOUNDERS':
                    case 'FOUNDER':
                        break;
                    default:
                        echo 'Unkwown field: ' . $xml->localName . "\n";
                        echo $xml->readInnerXml()."\n";
                }
            }
        }
        if (!isset($edrpouRecord->edrpou))
        {
            $edrpouRecord->edrpou = $edrpouRecord->name;
        }
        $edrpouRecord->save();
        $xml->close();
    }
}