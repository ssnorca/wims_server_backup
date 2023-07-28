<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model {
    protected $fillable = [
        'id',
        'purpose',
        'quantity_requested',
        'quantity_released',
        'request_status',
        'unit',
        'kit',
        'pending'
    ];

    protected $table = 'wims_kit_production';
}