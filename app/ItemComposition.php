<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemComposition extends Model{
    protected $fillable = [
        'id',
        'allocation_id',
        'purchase_id',
        'quantity_released', 
        'created_at',
        'updated_at',
    ];

    protected $table = 'wims_item_composition';

}