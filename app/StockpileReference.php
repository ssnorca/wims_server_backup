<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileReference extends Model{
    protected $fillable = [
        'ris_no',
        'quantity',
        'type_',
        'remarks',
        'status',
        // add all other fields
    ];
    protected $table = 'wims_stockpile_reference';

}