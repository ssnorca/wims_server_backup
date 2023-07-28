<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpilePreposition;

class StockpilePrepositionController extends Controller{

    public function index(){
         $result = DB::select(DB::raw("call sp_stockpilePrepositioning()"));
        return $result;
    }

    public function showbalance(){
        $result = DB::table('view_prepositioned_stockpile_no_date')
        ->get();
        return $result;
    }

    public function showbreakdown(){
        $result = DB::table('view_fpbreakdown')
        ->get();
        return $result;
    }

    public function edit($id){

    }
}