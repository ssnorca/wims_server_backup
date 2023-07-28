<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signatories extends Model{
    protected $fillable = [
        'id',
        'name_', 
        'designation', 
    ];

    protected $table = 'wims_signatories';

}