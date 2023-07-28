<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileReferenceWasteReplacement;

class StockpileReferenceWasteReplacementController extends Controller{

    /*public function index(){
        $result = DB::table('wims_stockpile_reference_waste')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }*/
    public function showwastedreplacement(){
        $result = DB::table('view_wasteditemreplacement')
        ->get();
        return $result;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'stockpile_reference_waste_id'=> 'required',
            'purchase_id'=> 'required'
         ]);
 
         $task = StockpileReferenceWasteReplacement::create([
            'stockpile_reference_waste_id' => $validatedData['stockpile_reference_waste_id'],
            'purchase_id' => $validatedData['purchase_id']
         ]);
 
         //return $task->id;
         return StockpileReferenceWasteReplacement::find($task->id);  
    }

    

}