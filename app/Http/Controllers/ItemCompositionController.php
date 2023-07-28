<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ItemComposition;

class ItemCompositionController extends Controller{

    public function index(){

    }

    public function store(Request $request){
      $validatedData = $request->validate([
         'allocation_id'=> 'required',
         'purchase_id'=> 'required'
      ]);
  
      $task = ItemComposition::create([
         'allocation_id' => $validatedData['allocation_id'],
         'purchase_id' => $validatedData['purchase_id']
      ]);
  
      //return $task->id;
      return ItemComposition::find($task->id);    
   }


    public function edit($id){

    }
}