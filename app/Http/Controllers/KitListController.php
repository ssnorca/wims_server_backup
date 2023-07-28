<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\KitList;

class KitListController extends Controller{

    public function storeKitList(Request $request){

        $validatedData = $request->validate([
            '_type'=> 'required',
            '_name'=> 'required',
            'quantity'=> 'required',
            'unit'=> 'required',
        ]);

        $task = KitList::create([
            '_type' => $validatedData['_type'],
            '_name' => $validatedData['_name'],
            'quantity' => $validatedData['quantity'],
            'unit' => $validatedData['unit']
         ]);
 
         //return $task->id;
         return KitList::find($task->id);

    }

    public function editList($id){
        $item = KitList::find($id);
        return $item;
    }


    public function listComponentupdate(Request $request, $id){

        $requestfood = KitList::where('id', $id)
        ->update([
            '_type' => $request->kitname,
            '_name' => $request->kitdescription,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        return $requestfood;
    }
    public function delete(Request $requestfood, $id){
        $requestfood = KitList::findOrFail($id);
        $requestfood -> delete();
        return 204;
    }
    
}