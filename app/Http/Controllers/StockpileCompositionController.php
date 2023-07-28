<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileComposition;

class StockpileCompositionController extends Controller{

    public function index(){
        /*$result = DB::table('wims_item AS i')
        ->join('wims_item_category AS ic','i.category_id','=','ic.id')
        ->select('i.id','ic.name AS type','ic.particular','i.name','i.unit')
        ->orderByRaw('i.created_at DESC')
        ->get();
        return $result;*/
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'prod_cat_id'=> 'required',
            'purchase_id'=> 'required',
            'emp_id'=> 'required',
            'expired_at'=>'required'
         ]);
 
         $task = StockpileComposition::create([
            'prod_cat_id' => $validatedData['prod_cat_id'],
            'purchase_id' => $validatedData['purchase_id'],
            'emp_id' => $validatedData['emp_id'],
            'expired_at' => $validatedData['expired_at']
         ]);
 
         //return $task->id;
         return StockpileComposition::find($task->id);  
    }

    public function edit($id){
        /*$item = Item::find($id);
        return $item;*/
    }
}