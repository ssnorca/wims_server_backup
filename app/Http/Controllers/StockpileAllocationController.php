<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileAllocation;

class StockpileAllocationController extends Controller{

    public function index(){
        $result = DB::table('wims_stockpile_allocation')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }
    public function show($id){
        $result = DB::table('wims_stockpile_allocation')
        ->select(DB::raw('SUM(quantity) AS total_allocated'))
        ->where('ris_id','=',$id)
        ->groupBy('ris_id')
        ->get();
        return $result;
    }
    public function store(Request $request){
         $validatedData = $request->validate([
            'stockpile_id'=> 'required',
            'ris_id'=> 'required'
         ]);
 
         $task = StockpileAllocation::create([
            'stockpile_id' => $validatedData['stockpile_id'],
            'ris_id' => $validatedData['ris_id']
         ]);
 
         //return $task->id;
         return StockpileAllocation::find($task->id);  
    }

    public function edit($id){
        /*$item = Item::find($id);
        return $item;*/
    }
    public function update(Request $request, $id){

        $requestfood = StockpileAllocation::where('id', $id)
        ->update([
            //'stockpile_id' => $request->stockpile_id,
            'status' => $request->status,
            'quantity' => $request->quantity
        ]);

        return $requestfood;
    }
}