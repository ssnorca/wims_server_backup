<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockCard extends Model{
    protected $fillable = [
        'id',
        'purchase_id', 
        'particular_name', 
        'created_at',
        'typeOf',
        '_reference',
        'quantity_received',
        'unit_cost',
        'unit_value',
        'quantity_issued',
        'end_user',
        'source_',
        'ris_no',
        'date_release',
        'remaining_balance',
        'purpose',
        'updated_at'
    ];

    protected $table = 'wims_stockcard_rawitem';

}