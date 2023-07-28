<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileReferenceWaste;

class StockpileReferenceWasteController extends Controller{

    public function index(){
        $result = DB::table('wims_stockpile_reference_waste')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }

    public function show($id){
        $result = DB::table('wims_stockpile_reference_waste')
        ->where('stockpile_ref_id','=',$id)
        ->get();
        return $result;
    }

    public function edit($id){
        $item = StockpileReferenceWaste::find($id);
        return $item;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'stockpile_ref_id'=> 'required',
            'item_type'=> 'required',
            'item_name'=> 'required',
            'item_desc'=> 'required',
            'item_remarks'=> 'required',
            'item_quantity'=>'required',
            'item_cost'=>'required',
            'istatus'=>'required'
         ]);
 
         $task = StockpileReferenceWaste::create([
            'stockpile_ref_id' => $validatedData['stockpile_ref_id'],
            'item_type' => $validatedData['item_type'],
            'item_name' => $validatedData['item_name'],
            'item_desc' => $validatedData['item_desc'],
            'item_remarks' => $validatedData['item_remarks'],
            'item_quantity'=>$validatedData['item_quantity'],
            'item_cost'=>$validatedData['item_cost'],
            'istatus'=>$validatedData['istatus'],
         ]);
 
         //return $task->id;
         return StockpileReferenceWaste::find($task->id);  
    }

    public function update(Request $request, $id){

        $requestfood = StockpileReferenceWaste::where('id', $id)
        ->update([
            'item_type' => $request->item_type,
            'item_type' => $request->item_type,
            'item_desc' => $request->item_desc,
            'item_remarks' => $request->item_remarks,
            'item_quantity' => $request->item_quantity,
            'item_cost' => $request->item_cost
        ]);

        return $requestfood;
    }
    

}