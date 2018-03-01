<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuySellRate extends Model
{
    const COMMERCIAL = 1;
    const INTERBANK = 2;
    const BLACK = 3;

    protected $fillable = ['day','type','cc'];
    //
    public function scopeCommercial($query, $date = null)
    {
        return $this->refined($query, $date, self::COMMERCIAL);
    }

    public function scopeInterbank($query, $date = null)
    {
        return $this->refined($query, $date, self::INTERBANK);
    }

    public function scopeBlack($query, $date = null)
    {
        return $this->refined($query, $date, self::BLACK);
    }
    private function refined($query, $date, $type)
    {
        if (!isset($date))
        {
            $date = now();
        }
        return $query->where('type', $type)->whereDate('day',$date->format('Y-m-d'));
    }

}
