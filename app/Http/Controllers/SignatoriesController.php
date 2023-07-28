<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Signatories;

class SignatoriesController extends Controller{

    public function index(){
        $result = DB::table('view_signatories')
        ->get();
        return $result;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name_'=> 'required',
            'designation'=> 'required'
         ]);
 
         $task = Signatories::create([
            'name_' => $validatedData['name_'],
            'designation' => $validatedData['designation']
         ]);
 
         //return $task->id;
         return Signatories::find($task->id);  
    }

    public function update(Request $request, $id){

        $requestfood = Signatories::where('id', $id)
        ->update([
            'name_' => $request->name,
            'designation' => $request->designation,
        ]);

        return $requestfood;

    }
    public function delete(Request $requestfood, $id){
        $requestfood = Signatories::findOrFail($id);
        $requestfood -> delete();
        return 204;
    }

}