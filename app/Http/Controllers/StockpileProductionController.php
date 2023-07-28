<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\StockpileProduction;

class StockpileProductionController extends Controller{
    public function index(){
        $result = DB::table('wims_stockpile_production')
        ->select('id','purpose','quantity_available','quantity_release','unit','unit_cost',DB::raw('FORMAT(unit_value,2) as unit_value'),'created_at','expired_at','type_','updated_at','composition','ratio_id','reference_id','warehouse','unit_cost','preposition_id')
        ->where('quantity_available','>','0')
        //->where('warehouse','=','Regional')
        ->orderByRaw('created_at DESC')
        ->paginate(5);
        return $result;
    }

    public function ratio(){
        $result = DB::table('wims_stockpile_ratio')
        ->get();
        return $result;
    }
    public function show($id){
        $result = DB::table('wims_stockpile_prod_category AS pc')
        ->leftJoin('wims_item_category AS ic','pc.item_cat_id','=','ic.id')
        ->leftJoin('wims_stockpile_composition AS sc','sc.prod_cat_id','=','pc.id')
        ->select('pc.id',DB::raw('FORMAT(SUM(sc.cost),2) AS cost'),'ic.particular','pc.quantity_requested',DB::raw('(SUM(sc.quantity)/pc.quantity_requested)*100 AS percentage'),'pc.request_status')
        ->where('stockpile_id','=',$id)
        ->groupBy('pc.id')
        ->get();
        return $result;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'purpose'=> 'required',
            'quantity_available'=> 'required',
            'unit'=> 'required',
            'type_'=> 'required',
            'ratio_id'=>'required',
            'warehouse'=>'required'
         ]);
 
         $task = StockpileProduction::create([
            'purpose' => $validatedData['purpose'],
            'quantity_available' => $validatedData['quantity_available'],
            'unit' => $validatedData['unit'],
            'type_' => $validatedData['type_'],
            'ratio_id' =>$validatedData['ratio_id'],
            'warehouse' =>$validatedData['warehouse'],
         ]);
 
         //return $task->id;
         return StockpileProduction::find($task->id);  
    }
    public function edit($id){
        $production = StockpileProduction::find($id);
        return $production;
    }

    public function showProvince($prov){
        $result = DB::table('wims_stockpile_production')
        ->where('warehouse','LIKE','%'. $prov . '%')
        ->orderByRaw('created_at DESC')
        ->paginate(5);
        return $result;
    }
    public function updates(Request $request, $id){

        $requestfood = StockpileProduction::where('id', $id)
        ->update([
            'purpose' => $request->purpose
            //'quantity_requested' => $request->quantity_requested
            //,'category_id' => $request->category_id
        ]);

        return $requestfood;
    }
}