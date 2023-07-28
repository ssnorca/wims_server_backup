<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller{

    public function index(){
        $result = DB::table('wims_item_category')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }

    public function store(Request $request){

        $validatedData = $request->validate([
           'name' => 'required',
           'particular'=> 'required'
        ]);

        $task = Category::create([
           'name' => $validatedData['name'],
           'particular' => $validatedData['particular']
        ]);

        //return $task->id;
        return Category::find($task->id);    
        //return RequestFood::create($request->all());
    }

    public function edit($id){
        $category = Category::find($id);
        return $category;
    }

    public function update(Request $request, $id){

        $requestfood = Category::where('id', $id)
        ->update([
            'name' => $request->name,
            'particular' => $request->particular
        ]);

        return $requestfood;
    }
}