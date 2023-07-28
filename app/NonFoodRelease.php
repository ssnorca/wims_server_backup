<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonFoodRelease extends Model{
    protected $fillable = [
        'allocation_id',
        'quantity_release',
        // add all other fields
    ];
    protected $table = 'wims_release_nfi';
    //protected $primaryKey = "ris_id";
    //public $incrementing = false;
    //protected $keyType = 'string';
}