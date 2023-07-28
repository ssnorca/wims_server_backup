<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable{
    use Notifiable,HasApiTokens;
    protected $fillable = [
        'id',
        'username', 
        'firstname',
        'lastname',
        'email',
        'division',
        'section',
        'contact',
        'designation',
        'valid', 
        'area',
    ];

    protected $table = 'wims_employee';

}