<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Kit;
use App\KitList;
use App\KitComposition;

class KitController extends Controller{
    public function index(){
        $result = DB::table('wims_kit_production')
        ->orderByRaw('created_at DESC')
        ->paginate(5);
        return $result;
    }

    public function composition(){
        $result = DB::table('wims_kit_list AS kl')
       /* ->Join('wims_item AS i','kl.item_id','=','i.id')
        ->select('kl.id', 'kl._type','i.name','kl.quantity', 'kl.unit','kl.item_id')*/
        ->orderByRaw('_type DESC')
        ->get();
        return $result;
    }

    public function listkit(){
        $result = DB::table('wims_kit_list AS kl')
      //  ->Join('wims_item AS i','kl.item_id','=','i.id')
        ->select('kl._type AS name')
        ->orderByRaw('kl._type ASC')
        ->distinct()
        ->get();
        return $result;
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'purpose'=> 'required',
            'quantity_requested'=> 'required',
            'kit'=> 'required',
            'request_status'=> 'required',
            'pending'=> 'required',
        ]);

        $task = Kit::create([
            'purpose' => $validatedData['purpose'],
            'quantity_requested' => $validatedData['quantity_requested'],
            'kit' => $validatedData['kit'],
            'request_status' => $validatedData['request_status'],
            'pending' => $validatedData['pending']
         ]);
 
         //return $task->id;
         return Kit::find($task->id);

    }

    public function storeKit(Request $request){

        $validatedData = $request->validate([
            'production_id'=> 'required',
            'purchase_id'=> 'required',
        ]);

        $task = KitComposition::create([
            'production_id' => $validatedData['production_id'],
            'purchase_id' => $validatedData['purchase_id']
         ]);
 
         //return $task->id;
         return KitComposition::find($task->id);

    }



    public function showkitcomposition($particular){
        $result = DB::select(DB::raw("CALL sp_kit_composition('$particular')"));
        return $result;
    }
    public function showkitcompositionitem($particular){
        $result = DB::select(DB::raw("CALL sp_kit_compositionitem('$particular')"));
        return $result;
    }
    public function edit($id){
        $item = Kit::find($id);
        return $item;
    }



    public function update(Request $request, $id){

        $requestfood = Kit::where('id', $id)
        ->update([
            'purpose' => $request->purpose,
            'quantity_requested' => $request->quantity_requested,
            'kit' => $request->kit
        ]);

        return $requestfood;
    }
}
