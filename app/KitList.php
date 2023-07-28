<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KitList extends Model{
    protected $fillable = [
        'id',
        '_type', 
        '_name',
        'quantity',
        'unit',
        'created_at',
        'updated_at' 
    ];

    protected $table = 'wims_kit_list';

}