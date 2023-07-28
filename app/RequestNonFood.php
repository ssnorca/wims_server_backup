<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestNonFood extends Model{
    protected $fillable = [
        'ris_id',
        'emp_id',
        'purpose',
        'date_request',
        'destination',
        'pending',
        // add all other fields
        'entity_name',
        'fund_cluster',
        'division',
        'office',
        'issued_by',
        'approved_by',
        'received_by',
        'prepared_by',
        'delivery_site',
        'delivery_date',
        'contact_person',
        'contact_number'
    ];
    protected $table = 'wims_request_nfi';
    //protected $primaryKey = "ris_id";
    //public $incrementing = false;
    //protected $keyType = 'string';
}