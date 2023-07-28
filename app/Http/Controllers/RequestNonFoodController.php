<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RequestNonFood;

class RequestNonFoodController extends Controller{
    public function index(){

        $result = DB::table('ris_view_nf')
        ->where('pending','!=',2)
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }

    public function ris(){
        $result = DB::table('ris_view')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }

    public function show(){
        $result = DB::table('wims_request_fi')
        ->get();
        return $result;
    }

    public function store(Request $request){

        $validatedData = $request->validate([
           'emp_id' => 'required',
           'date_request' => 'required',
           'purpose'=> 'required',
           'destination'=> 'required',
           'pending'=> 'required'
        ]);

        $task = RequestNonFood::create([
           'emp_id' => $validatedData['emp_id'],
           'date_request' => $validatedData['date_request'],
           'purpose' => $validatedData['purpose'],
           'destination' => $validatedData['destination'],
           'pending' => $validatedData['pending']
        ]);

        //return $task->id;
        return RequestNonFood::find($task->id);    
        //return RequestFood::create($request->all());
    }

    public function updates(Request $request, $id){

        $requestfood = RequestNonFood::where('ris_id', $id)
        ->update([
            'entity_name' => $request->entity_name,
            'fund_cluster' => $request->fund_cluster,
            'division' => $request->division,
            'office' => $request->office,
            'approved_by' => $request->approved_by,
            'issued_by' => $request->issued_by,
            'received_by' => $request->received_by,
            'prepared_by' => $request->prepared_by,
            'center_code' => $request->center_code,
            'delivery_site' => $request->delivery_site,
            'delivery_date' => $request->delivery_date,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
        ]);

        return $requestfood;

    }

    public function deleteNonFoodRequest(Request $request, $id){

        $requestfood = RequestNonFood::where('ris_id', $id)
        ->update([
            'pending' => $request->pending
        ]);

        return $requestfood;

    }

    public function delete(Request $requestfood, $id){
        $requestfood = RequestNonFood::findOrFail($id);
        $requestfood -> delete();
        return 204;
    }
}