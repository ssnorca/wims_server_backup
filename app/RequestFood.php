<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFood extends Model{
    protected $fillable = [
        'ris_id',
        'emp_id',
        'purpose',
        'date_request',
        'destination',
        'quantity_requested',
        'pending',
        'purpose_type',
        // add all other fields
        'entity_name',
        'fund_cluster',
        'division',
        'office',
        'issued_by',
        'approved_by',
        'received_by',
        'prepared_by',
        'ratio_id',
        'provider',
        'delivery_site',
        'delivery_date',
        'contact_person',
        'contact_number'
    ];
    protected $table = 'wims_request_fi';
    //protected $primaryKey = "ris_id";
    //public $incrementing = false;
    //protected $keyType = 'string';
}