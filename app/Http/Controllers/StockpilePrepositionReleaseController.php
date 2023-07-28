<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpilePrepositionRelease;

class StockpilePrepositionReleaseController extends Controller{

    public function index(){
        // $result = DB::select(DB::raw("call sp_stockpilePrepositioning()"));
        $result = DB::table('wims_stockpile_preposition_release AS spr')
        ->join ('wims_request_fi AS rf','rf.ris_id', '=', 'spr.destination')
        ->select('spr.id', 'spr.release_no', 'spr.ris_no', 'spr.quantity', 'rf.destination','spr.destination AS risdestination', 'spr.created_at', 'spr.updated_at')
        ->get();
        return $result;
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'ris_no'=> 'required',
            'quantity'=> 'required',
            'destination'=>'required'
        ]);

        $task = StockpilePrepositionRelease::create([
            'ris_no' => $validatedData['ris_no'],
            'quantity' => $validatedData['quantity'],
            'destination' => $validatedData['destination']
         ]);
 
         //return $task->id;
         return StockpilePrepositionRelease::find($task->id);

    }

    public function edit($id){

    }
}