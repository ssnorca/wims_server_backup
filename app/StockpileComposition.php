<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockpileComposition extends Model{
    protected $fillable = [
        'id',
        'prod_cat_id',
        'purchase_id',
        'quantity',
        'cost',
        'emp_id',
        'expired_at',
        // add all other fields
    ];
    protected $table = 'wims_stockpile_composition';
    //protected $primaryKey = "ris_id";
    //public $incrementing = false;
    //protected $keyType = 'string';
}