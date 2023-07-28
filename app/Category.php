<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $fillable = [
        'id',
        'name', 
        'particular', 
    ];

    protected $table = 'wims_item_category';

}