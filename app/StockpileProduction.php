<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileProduction extends Model{
    protected $fillable = [
        'id',
        'purpose',
        'quantity_available',
        'unit',
        'created_at',
        'updated_at',
        'type_',
        'ratio_id',
        'warehouse',
        // add all other fields
    ];
    protected $table = 'wims_stockpile_production';
}