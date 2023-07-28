<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPurchase extends Model{
    protected $fillable = [
        'id',
        'cost',
        'quantity_available',
        'quantity_release',
        '_description',
        'unit_cost',
        '_source',
        'remarks',
        'date_received',
        'date_expire',
        'item_id',
        'warehouse_id', 
        'purchase_order',
        'delivery_receipt',
    ];

    protected $table = 'wims_item_purchase';

}