<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller{

    public function index(){
        $result = DB::table('wims_employee')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }
    public function show($ris_id){
        //$result = DB::select(DB::raw("CALL sp_nonfooditem_releases_ris('$ris_id')"));
        //return $result;
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'username'=> 'required',
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required',
            'division'=> 'required',
            'section'=> 'required',
            'contact'=> 'required',
            'designation'=> 'required',
            'valid'=> 'required',
            'area'=>'required'
         ]);
 
         $task = Employee::create([
            'username' => $validatedData['username'],
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'section' => $validatedData['section'],
            'contact' => $validatedData['contact'],
            'division' => $validatedData['division'],
            'designation' => $validatedData['designation'],
            'valid' => $validatedData['valid'],
            'area' => $validatedData['area']
         ]);
 
         //return $task->id;
         return Employee::find($task->id);
    }

    public function updates(Request $request, $id){

        $requestfood = Employee::where('username', $id)
        ->update([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'section' => $request->section,
            'contact' => $request->contact,
            'division' => $request->division,
            'designation' => $request->designation,
            'valid' => $request->valid,
            'area' => $request->area,
        ]);

        return $requestfood;

    }

}