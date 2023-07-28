<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileRelease extends Model{
    protected $fillable = [
        'ris_id',
        'quantity',
        'provider',
        // add all other fields
    ];
    protected $table = 'wims_release_fi';
    //protected $primaryKey = "ris_id";
    //public $incrementing = false;
    //protected $keyType = 'string';
}