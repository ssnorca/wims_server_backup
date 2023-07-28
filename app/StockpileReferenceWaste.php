<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileReferenceWaste extends Model{
    protected $fillable = [
        'stockpile_ref_id',
        'item_type',
        'item_name',
        'item_remarks',
        'item_quantity',
        'item_unit',
        'item_cost',
        'item_desc',
        'status',
        // add all other fields
    ];
    protected $table = 'wims_stockpile_reference_waste';

}