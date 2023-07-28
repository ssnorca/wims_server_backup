<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ItemPurchase;

class ItemPurchaseController extends Controller{

    public function index(){
        $result = DB::table('wims_item_purchase AS ip')
        ->join('wims_item AS i','i.id','=','ip.item_id')
        ->select('ip.id','i.name','ip._description',DB::raw('FORMAT(ip.cost,2) AS cost'),DB::raw('FORMAT(ip.unit_cost,2) AS unit_cost'),'ip.quantity_available','ip.quantity_release','ip._source','ip.remarks','ip.created_at','ip.date_expire','ip.purchase_order','ip.delivery_receipt')
        ->orderByRaw('ip.created_at DESC')
        ->get();
        return $result;
    }

    public function show(){
        $result = DB::table('wims_item_purchase AS ip')
        ->join('wims_item AS i','i.id','=','ip.item_id')
        ->join('wims_item_category AS ic','i.category_id','=','ic.id')
        ->select('ip.id','ic.particular','i.name','ip.cost','ip.quantity_available','ip._description','ip.date_expire','ip.purchase_order','ip.delivery_receipt')
        ->where('ip.quantity_available','>',0)
        ->get();
        return $result;
    }

    public function showparticular($name){
        $result = DB::table('wims_item_purchase AS ip')
        ->join('wims_item AS i','i.id','=','ip.item_id')
        ->join('wims_item_category AS ic','i.category_id','=','ic.id')
        ->select('ip.id','ic.particular','ip.cost','ip.quantity_available','ip._description','ip.date_expire','ip.purchase_order')
        ->where('ic.particular','=',$name)
        ->where('ip.quantity_available','>',0)
        ->paginate(4);
        return $result;
    }

    public function store(Request $request){
        $validatedData = $request->validate([
           'cost'=> 'required',
           'quantity_available'=> 'required',
           '_description'=>'required',
           '_source'=>'required',
           'remarks'=>'',
           'date_received'=>'required',
           'date_expire'=>'required',
           'item_id'=>'required',
           'warehouse_id'=>'required',
           'purchase_order'=>'',
           'delivery_receipt'=>'required'
        ]);

        $task = ItemPurchase::create([
           'cost' => $validatedData['cost'],
           'quantity_available' => $validatedData['quantity_available'],
           '_description' => $validatedData['_description'],
           '_source' => $validatedData['_source'],
           'remarks' => $validatedData['remarks'],
           'date_received' => $validatedData['date_received'],
           'date_expire' => $validatedData['date_expire'],
           'item_id' => $validatedData['item_id'],
           'warehouse_id' => $validatedData['warehouse_id'],
           'purchase_order' => $validatedData['purchase_order'],
           'delivery_receipt' =>$validatedData['delivery_receipt'],
        ]);

        //return $task->id;
        return ItemPurchase::find($task->id);  
    }

    public function edit($id){
        $item = ItemPurchase::find($id);
        return $item;
    }

    public function update(Request $request, $id){

        $requestfood = ItemPurchase::where('id', $id)
        ->update([
            'cost' => $request->cost,
            'quantity_available' => $request->quantity_available,
            '_description' => $request->_description,
            '_source' => $request->_source,
            'remarks' => $request->remarks,
            'date_received' => $request->date_received,
            'date_expire' => $request->date_expire,
            'item_id' => $request->item_id,
            'warehouse_id' => $request->warehouse_id,
            'delivery_receipt' => $request->delivery_receipt,
            'purchase_order' => $request->purchase_order,
        ]);

        return $requestfood;
    }
}