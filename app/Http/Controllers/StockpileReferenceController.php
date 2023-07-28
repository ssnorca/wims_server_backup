<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileReference;

class StockpileReferenceController extends Controller{

    public function index(){
        $result = DB::table('wims_stockpile_reference')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'ris_no'=> 'required',
            'quantity'=> 'required',
            'remarks'=> 'required',
            'status'=>'required'
         ]);
 
         $task = StockpileReference::create([
            'ris_no' => $validatedData['ris_no'],
            'quantity' => $validatedData['quantity'],
            'remarks' => $validatedData['remarks'],
            'status'=>$validatedData['status']
         ]);
 
         //return $task->id;
         return StockpileReference::find($task->id);  
    }

    public function edit($id){
        $item = StockpileReference::find($id);
        return $item;
    }
    public function show(){
        $result = DB::table('wims_request_fi AS rf')
        ->join('wims_stockpile_reference AS sr','rf.ris_id','=','sr.ris_no')
        ->select('sr.id','sr.status','rf.destination', 'rf.ris_id','sr.created_at', DB::raw('SUM(sr.quantity)as returned'))
        ->where('sr.remarks','=','For Reconditioning')
        ->groupBy('sr.id')
        ->get();
        return $result;
    }
    
    public function update(Request $request, $id){

        $requestfood = StockpileReference::where('id', $id)
        ->update([
            'status' => $request->status,        
        ]);

        return $requestfood;
    }
}