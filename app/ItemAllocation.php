<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAllocation extends Model{
    protected $fillable = [
        'id',
        'ris_id',
        'item_id',
        'quantity_requested', 
        'request_status', 
        'created_at',
        'updated_at',
    ];

    protected $table = 'wims_item_allocation';

}