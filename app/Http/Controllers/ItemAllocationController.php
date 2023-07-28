<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ItemAllocation;

class ItemAllocationController extends Controller{

   
    public function index(){
        $result = DB::table('view_nonfooditems')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }

    public function particular_ris($ris_id){
      $result = DB::select(DB::raw("CALL sp_nonfooditem_ris('$ris_id')"));
      return $result;
  }

    public function store(Request $request){
        $validatedData = $request->validate([
           'item_id'=> 'required',
           'ris_id'=> 'required',
           'quantity_requested'=>'required'
        ]);

        $task = ItemAllocation::create([
           'item_id' => $validatedData['item_id'],
           'quantity_requested' => $validatedData['quantity_requested'],
           'ris_id' => $validatedData['ris_id']
        ]);

        //return $task->id;
        return ItemAllocation::find($task->id);  
   }

    public function composition(Request $request){
    $validatedData = $request->validate([
       'allocation_id'=> 'required',
       'purchase_id'=> 'required'
    ]);

    $task = ItemAllocation::create([
       'allocation_id' => $validatedData['allocation_id'],
       'purchase_id' => $validatedData['purchase_id']
    ]);

    //return $task->id;
    return ItemAllocation::find($task->id);  
    }

    /*public function edit($id){
        $item = Item::find($id);
        return $item;
    }*/

    public function update(Request $request, $id){

        $requestfood = ItemAllocation::where('id', $id)
        ->update([
            'item_id' => $request->item_id,
            'quantity_requested' => $request->quantity
        ]);

        return $requestfood;
    }
}
