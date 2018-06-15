<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = ['num'];

    public static function pushData(int $start = 0, int $end = 0)
    {
        for ($i = $start; $i <= $end; $i++) {
            self::create(['num' => $i]);
        }
    }
}
