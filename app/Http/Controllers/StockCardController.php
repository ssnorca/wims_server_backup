<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockCard;

class StockCardController extends Controller{

    public function index(){
        $result = DB::table('wims_stockcard_rawitem')
        ->get();
        return $result;
    }


    public function edit($id){

    }
}