<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller{

    public function index(){
        $result = DB::table('wims_item AS i')
        ->join('wims_item_category AS ic','i.category_id','=','ic.id')
        ->select('i.id','ic.name AS type','ic.particular','i.name','i.unit')
        ->orderByRaw('i.created_at DESC')
        ->get();
        return $result;
    }
    public function item_paginate(){
        $result = DB::table('wims_item AS i')
        ->join('wims_item_category AS ic','i.category_id','=','ic.id')
        ->select('i.id','ic.name AS type','ic.particular','i.name','i.unit')
        ->orderByRaw('i.created_at DESC')
      //  ->paginate(30);
       -> get();
        return $result;
    }
    public function nfi(){
        $result = DB::table('wims_item AS i')
        ->join('wims_item_category AS ic','i.category_id','=','ic.id')
        ->select('i.id','ic.name AS type','ic.particular','i.name','i.unit')
        ->where('ic.name','=','Non-Food Item')
        ->orderByRaw('i.created_at DESC')
        ->get();
        return $result;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
           'name'=> 'required',
           'category_id'=> 'required',
           'unit'=>'required'
        ]);

        $task = Item::create([
           'name' => $validatedData['name'],
           'category_id' => $validatedData['category_id'],
           'unit' => $validatedData['unit']
        ]);

        //return $task->id;
        return Item::find($task->id);  
   }

    public function edit($id){
        $item = Item::find($id);
        return $item;
    }

    public function update(Request $request, $id){

        $requestfood = Item::where('id', $id)
        ->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'category_id' => $request->category_id
        ]);

        return $requestfood;
    }
}