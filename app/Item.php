<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    protected $fillable = [
        'id',
        'name', 
        'unit', 
        'category_id',
    ];

    protected $table = 'wims_item';

}