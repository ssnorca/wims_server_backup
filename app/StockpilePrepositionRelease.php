<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpilePrepositionRelease extends Model{
    protected $fillable = [
        'id',
        'ris_no',
        'quantity',
        'created_at',
        'updated_at',
        'destination',        
        // add all other fields
    ];
    protected $table = 'wims_stockpile_preposition_release';
}