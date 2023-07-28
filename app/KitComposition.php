<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KitComposition extends Model{
    protected $fillable = [
        'id',
        'production_id', 
        'purchase_id',
        'quantity',
        'cost',
        'created_at',
        'updated_at' 
    ];

    protected $table = 'wims_kit_composition';

}