<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileAllocation extends Model{
    protected $fillable = [
        'id',
        'stockpile_id',
        'ris_id',
        'status',
        'quantity',
        
        // add all other fields
    ];
    protected $table = 'wims_stockpile_allocation';
    //protected $primaryKey = "ris_id";
    //public $incrementing = false;
    //protected $keyType = 'string';
}