<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RequestFood;

class RequestFoodItemController extends Controller{
    public function index(){
        $result = DB::table('view_fooditems AS vf')
        ->Join('ris_view AS rv','rv.ris_id','=','vf.ris_id')
        ->where('rv.pending','<>',2)
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
    /*public function percentage($id){
        $result = DB::table('wims_request_fi AS rf')
        ->leftJoin('wims_stockpile_allocation AS sa','rf.ris_id','=','sa.ris_id')
        ->where('rf.ris_id','=',$id)
        ->select('rf.ris_id','rf.purpose',DB::raw('(SUM(sa.quantity)/rf.quantity_requested)*100 AS percentage'),DB::raw('SUM(sa.quantity) AS allocated'))
        ->orderByRaw('rf.created_at DESC')
        ->groupBy('rf.ris_id')
        ->get();
        return $result;
    }*/

    public function showratio($ratio_id, $quantity, $request){
        $result = DB::select(DB::raw("CALL sp_compute_ratio('$ratio_id','$quantity','$request')"));
        return $result;
    }

    public function show(){
        $result = DB::table('wims_request_fi')
        ->get();
        return $result;
    }

    public function warehouse(){
        $result = DB::table('wims_warehouse')
        ->get();
        return $result;
    }

    public function warehouseprovince($name){
        $result = DB::table('wims_warehouse')
        ->select('id','name','province')
        ->where('province','=',$name)
        ->get();
        return $result;
    }
    public function store(Request $request){

        $validatedData = $request->validate([
           'emp_id' => 'required',
           'date_request' => 'required',
           'purpose'=> 'required',
           'quantity_requested'=> 'required',
           'destination'=> 'required',
           'pending'=> 'required',
           'purpose_type'=> 'required',
           'ratio_id'=>'required'
        ]);

        $task = RequestFood::create([
           'emp_id' => $validatedData['emp_id'],
           'date_request' => $validatedData['date_request'],
           'purpose' => $validatedData['purpose'],
           'quantity_requested' => $validatedData['quantity_requested'],
           'destination' => $validatedData['destination'],
           'pending' => $validatedData['pending'],
           'purpose_type' => $validatedData['purpose_type'],
           'ratio_id' => $validatedData['ratio_id']
        ]);

        //return $task->id;
        return RequestFood::find($task->id);    
        //return RequestFood::create($request->all());
    }

    public function updates(Request $request, $id){

        $requestfood = RequestFood::where('ris_id', $id)
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
            'provider' => $request->provider,
            'quantity_requested' => $request->quantity_requested,
            'delivery_site' => $request->delivery_site,
            'delivery_date' => $request->delivery_date,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
        ]);

        return $requestfood;

    }

    public function deleteFoodRequest(Request $request, $id){

        $requestfood = RequestFood::where('ris_id', $id)
        ->update([
            'pending' => $request->pending
        ]);

        return $requestfood;

    }

    public function delete(Request $requestfood, $id){
        $requestfood = RequestFood::findOrFail($id);
        $requestfood -> delete();
        return 204;
    }
}