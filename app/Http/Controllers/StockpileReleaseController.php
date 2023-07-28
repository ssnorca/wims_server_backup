<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileRelease;

class StockpileReleaseController extends Controller{

    public function index(){
        $result = DB::table('wims_release_fi')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }
    public function show($id){
        $result = DB::table('wims_request_fi AS rf')
        ->leftJoin('wims_release_fi AS rfi','rf.ris_id','=','rfi.ris_id')
        ->select('rf.ris_id','rf.purpose',DB::raw('SUM(rfi.quantity) AS released'))
        ->orderByRaw('rf.created_at DESC')
        ->groupBy('rf.ris_id')
        ->get();
        return $result;
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'ris_id'=> 'required',
            'quantity'=> 'required',
            'provider' => 'required',
         ]);
 
         $task = StockpileRelease::create([
            'ris_id' => $validatedData['ris_id'],
            'quantity' => $validatedData['quantity'],
            'provider' => $validatedData['provider']
         ]);
 
         //return $task->id;
         return StockpileRelease::find($task->id);
    }

}