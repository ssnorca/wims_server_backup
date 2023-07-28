<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\NonFoodRelease;

class NonFoodReleaseController extends Controller{

    public function index(){
        $result = DB::table('wims_release_fi')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }
    public function show($ris_id){
        $result = DB::select(DB::raw("CALL sp_nonfooditem_releases_ris('$ris_id')"));
        return $result;
        /*$result = DB::table('wims_request_fi AS rf')
        ->leftJoin('wims_release_fi AS rfi','rf.ris_id','=','rfi.ris_id')
        ->select('rf.ris_id','rf.purpose',DB::raw('SUM(rfi.quantity) AS released'))
        ->orderByRaw('rf.created_at DESC')
        ->groupBy('rf.ris_id')
        ->get();
        return $result;*/
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'allocation_id'=> 'required',
            'quantity_release'=> 'required'
         ]);
 
         $task = NonFoodRelease::create([
            'allocation_id' => $validatedData['allocation_id'],
            'quantity_release' => $validatedData['quantity_release']
         ]);
 
         //return $task->id;
         return NonFoodRelease::find($task->id);
    }

}