<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model{
    protected $fillable = [
        'id',
        'purchase_id', 
        'particular_name',
        'date_added',
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
        'purpose' 
    ];

    protected $table = 'wims_stockcard_rawitem';

}