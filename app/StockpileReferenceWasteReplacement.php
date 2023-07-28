<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileReferenceWasteReplacement extends Model{
    protected $fillable = [
        'stockpile_reference_waste_id',
        'purchase_id',
        //'quantity',
        // add all other fields
    ];
    protected $table = 'wims_stockpile_reference_waste_replacement';

}