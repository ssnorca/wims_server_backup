<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpilePreposition extends Model{
    protected $fillable = [
        'id',
        'ris_no',
        'quantity_received',
        'quantity_released',
        'purpose_type',
        'created_at',
        'updated_at'        
        // add all other fields
    ];
    protected $table = 'wims_stockpile_preposition';
}