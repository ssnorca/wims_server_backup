<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Employee;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::middleware('auth:sanctum')->get('requestfood', 'RequestFoodItemController@index');
//Route::get('requestfood', 'RequestFoodItemController@index');
Route::middleware('auth:sanctum')->get('requestfoodratio/{ratio_id}/{quantity}/{request}', 'RequestFoodItemController@showratio');
//Route::get('requestfoodratio/{ratio_id}/{quantity}/{request}',  'RequestFoodItemController@showratio');
Route::middleware('auth:sanctum')->post('requestfood', 'RequestFoodItemController@store');
//Route::post('requestfood', 'RequestFoodItemController@store');
Route::middleware('auth:sanctum')->get('requestfoodlist', 'RequestFoodItemController@show');
//Route::get('requestfoodlist', 'RequestFoodItemController@show');
Route::middleware('auth:sanctum')->get('requestfood/ris/', 'RequestFoodItemController@ris');
//Route::get('requestfood/ris/', 'RequestFoodItemController@ris');
Route::middleware('auth:sanctum')->get('requestfood/warehouse', 'RequestFoodItemController@warehouse');
//Route::get('requestfood/warehouse', 'RequestFoodItemController@warehouse');
Route::middleware('auth:sanctum')->get('requestfood/warehouse/{name}', 'RequestFoodItemController@warehouseprovince');
//Route::get('requestfood/warehouse/{name}', 'RequestFoodItemController@warehouseprovince');
Route::middleware('auth:sanctum')->put('requestfood/updates/{id}', 'RequestFoodItemController@updates');
//Route::put('requestfood/updates/{id}', 'RequestFoodItemController@updates');
Route::middleware('auth:sanctum')->delete('requestfood/{id}', 'RequestFoodItemController@delete');
//Route::delete('requestfood/{id}', 'RequestFoodItemController@delete');
Route::middleware('auth:sanctum')->put('requestfood/deleteFoodRequest/{id}', 'RequestFoodItemController@deleteFoodRequest');
//Route::put('requestfood/deleteFoodRequest/{id}', 'RequestFoodItemController@deleteFoodRequest');




Route::middleware('auth:sanctum')->get('nonfood', 'RequestNonFoodController@index');
//Route::get('nonfood', 'RequestNonFoodController@index');
Route::middleware('auth:sanctum')->post('nonfood', 'RequestNonFoodController@store');
//Route::post('nonfood', 'RequestNonFoodController@store');
Route::middleware('auth:sanctum')->put('nonfood/updates/{id}', 'RequestNonFoodController@updates');
//Route::put('nonfood/updates/{id}', 'RequestNonFoodController@updates');
Route::middleware('auth:sanctum')->put('nonfood/deleteNonFoodRequest/{id}', 'RequestNonFoodController@deleteNonFoodRequest');
//Route::put('nonfood/deleteNonFoodRequest/{id}', 'RequestNonFoodController@deleteNonFoodRequest');


Route::middleware('auth:sanctum')->get('production', 'StockpileProductionController@index');
//Route::get('production',  'StockpileProductionController@index');
Route::middleware('auth:sanctum')->get('production/ratio', 'StockpileProductionController@ratio');
//Route::get('production/ratio',  'StockpileProductionController@ratio');
Route::middleware('auth:sanctum')->get('production/view/{id}', 'StockpileProductionController@show');
//Route::get('production/view/{id}',  'StockpileProductionController@show');
Route::middleware('auth:sanctum')->get('production/province/{prov}', 'StockpileProductionController@showProvince');
//Route::get('production/province/{prov}',  'StockpileProductionController@showProvince');
Route::middleware('auth:sanctum')->get('production/edit/{id}', 'StockpileProductionController@edit');
//Route::get('production/edit/{id}',  'StockpileProductionController@edit');
Route::middleware('auth:sanctum')->post('production', 'StockpileProductionController@store');
//Route::post('production', 'StockpileProductionController@store');
Route::middleware('auth:sanctum')->put('production/updates/{id}', 'StockpileProductionController@updates');
//Route::put('production/updates/{id}', 'StockpileProductionController@updates');

Route::middleware('auth:sanctum')->get('category', 'CategoryController@index');
//Route::get('category', 'CategoryController@index');
Route::middleware('auth:sanctum')->get('category/edit/{id}', 'CategoryController@edit');
//Route::get('category/edit/{id}', 'CategoryController@edit');
Route::middleware('auth:sanctum')->post('category', 'CategoryController@store');
//Route::post('category', 'CategoryController@store');
Route::middleware('auth:sanctum')->put('category/update/{id}', 'CategoryController@update');
//Route::put('category/update/{id}', 'CategoryController@update');


Route::middleware('auth:sanctum')->get('item', 'ItemController@index');
//Route::get('item', 'ItemController@index');
Route::middleware('auth:sanctum')->get('item_page', 'ItemController@item_paginate');
//Route::get('item_page', 'ItemController@item_paginate');
Route::middleware('auth:sanctum')->get('item/nfi', 'ItemController@nfi');
//Route::get('item/nfi', 'ItemController@nfi');
Route::middleware('auth:sanctum')->get('item/edit/{id}', 'ItemController@edit');
//Route::get('item/edit/{id}', 'ItemController@edit');
Route::middleware('auth:sanctum')->post('item', 'ItemController@store');
//Route::post('item', 'ItemController@store');
Route::middleware('auth:sanctum')->put('item/update/{id}', 'ItemController@update');
//Route::put('item/update/{id}', 'ItemController@update');


Route::middleware('auth:sanctum')->get('itempurchase', 'ItemPurchaseController@index');
//Route::get('itempurchase', 'ItemPurchaseController@index');
Route::middleware('auth:sanctum')->get('itempurchase/edit/{id}', 'ItemPurchaseController@edit');
//Route::get('itempurchase/edit/{id}', 'ItemPurchaseController@edit');
Route::middleware('auth:sanctum')->get('itempurchase/showparticular/{name}', 'ItemPurchaseController@showparticular');
//Route::get('itempurchase/showparticular/{name}', 'ItemPurchaseController@showparticular');
//Route::middleware('auth:sanctum')->get('itempurchase/show/', 'ItemPurchaseController@show');
Route::get('itempurchase/show/', 'ItemPurchaseController@show');
Route::middleware('auth:sanctum')->post('itempurchase', 'ItemPurchaseController@store');
//Route::post('itempurchase', 'ItemPurchaseController@store');
Route::middleware('auth:sanctum')->put('itempurchase/update/{id}', 'ItemPurchaseController@update');
//Route::put('itempurchase/update/{id}', 'ItemPurchaseController@update');

Route::middleware('auth:sanctum')->post('stockpilecomposition', 'StockpileCompositionController@store');
//Route::post('stockpilecomposition', 'StockpileCompositionController@store');


Route::middleware('auth:sanctum')->post('itemallocation', 'ItemAllocationController@store');
//Route::post('itemallocation', 'ItemAllocationController@store');
Route::middleware('auth:sanctum')->get('itemallocation', 'ItemAllocationController@index');
//Route::get('itemallocation', 'ItemAllocationController@index');
Route::middleware('auth:sanctum')->get('itemallocation/{ris_id}', 'ItemAllocationController@particular_ris');
//Route::get('itemallocation/{ris_id}', 'ItemAllocationController@particular_ris');
//Route::middleware('auth:sanctum')->put('itemallocation/update/{id}', 'ItemAllocationController@update');
Route::put('itemallocation/update/{id}', 'ItemAllocationController@update');

Route::middleware('auth:sanctum')->post('itemcomposition', 'ItemCompositionController@store');
//Route::post('itemcomposition', 'ItemCompositionController@store');


Route::middleware('auth:sanctum')->post('stockpileallocation', 'StockpileAllocationController@store');
//Route::post('stockpileallocation', 'StockpileAllocationController@store');
Route::middleware('auth:sanctum')->get('stockpileallocation', 'StockpileAllocationController@index');
//Route::get('stockpileallocation', 'StockpileAllocationController@index');
Route::middleware('auth:sanctum')->get('stockpileallocation/{id}', 'StockpileAllocationController@show');
//Route::get('stockpileallocation/{id}', 'StockpileAllocationController@show');
Route::middleware('auth:sanctum')->put('stockpileallocation/update/{id}', 'StockpileAllocationController@update');
//Route::put('stockpileallocation/update/{id}', 'StockpileAllocationController@update');

Route::middleware('auth:sanctum')->get('stockpilerelease', 'StockpileReleaseController@index');
//Route::get('stockpilerelease', 'StockpileReleaseController@index');
Route::middleware('auth:sanctum')->post('stockpilerelease', 'StockpileReleaseController@store');
//Route::post('stockpilerelease', 'StockpileReleaseController@store');



Route::middleware('auth:sanctum')->get('stockpilereference', 'StockpileReferenceController@index');
//Route::get('stockpilereference', 'StockpileReferenceController@index');
Route::middleware('auth:sanctum')->get('stockpilereferenceEdit/{id}', 'StockpileReferenceController@edit');
//Route::get('stockpilereferenceEdit/{id}', 'StockpileReferenceController@edit');
Route::middleware('auth:sanctum')->post('stockpilereference', 'StockpileReferenceController@store');
//Route::post('stockpilereference', 'StockpileReferenceController@store');
Route::middleware('auth:sanctum')->get('stockpilereferencelist', 'StockpileReferenceController@show');
//Route::get('stockpilereferencelist', 'StockpileReferenceController@show');
Route::middleware('auth:sanctum')->put('stockpilereference/update/{id}', 'StockpileReferenceController@update');
//Route::put('stockpilereference/update/{id}', 'StockpileReferenceController@update');


Route::middleware('auth:sanctum')->get('stockpilereferencewaste', 'StockpileReferenceWasteController@index');
//Route::get('stockpilereferencewaste', 'StockpileReferenceWasteController@index');
Route::middleware('auth:sanctum')->post('stockpilereferencewaste', 'StockpileReferenceWasteController@store');
//Route::post('stockpilereferencewaste', 'StockpileReferenceWasteController@store');
Route::middleware('auth:sanctum')->get('stockpilereferencewasteEdit/{id}', 'StockpileReferenceWasteController@edit');
//Route::get('stockpilereferencewasteEdit/{id}', 'StockpileReferenceWasteController@edit');
Route::middleware('auth:sanctum')->put('stockpilereferencewaste/update/{id}', 'StockpileReferenceWasteController@update');
//Route::put('stockpilereferencewaste/update/{id}', 'StockpileReferenceWasteController@update');
Route::middleware('auth:sanctum')->get('stockpilereferencewasteShow/{id}', 'StockpileReferenceWasteController@show');
//Route::get('stockpilereferencewasteShow/{id}', 'StockpileReferenceWasteController@show');

Route::middleware('auth:sanctum')->post('stockpilereferencewasteReplace', 'StockpileReferenceWasteReplacementController@store');
//Route::post('stockpilereferencewasteReplace', 'StockpileReferenceWasteReplacementController@store'); 
Route::middleware('auth:sanctum')->get('stockpilereferencewasteView', 'StockpileReferenceWasteReplacementController@showwastedreplacement');
//Route::get('stockpilereferencewasteView', 'StockpileReferenceWasteReplacementController@showwastedreplacement');


Route::middleware('auth:sanctum')->get('nonfoodrelease/{ris_id}', 'NonFoodReleaseController@show');
//Route::get('nonfoodrelease/{ris_id}', 'NonFoodReleaseController@show');
Route::middleware('auth:sanctum')->post('nonfoodrelease', 'NonFoodReleaseController@store');
//Route::post('nonfoodrelease', 'NonFoodReleaseController@store');


Route::middleware('auth:sanctum')->get('signatories', 'SignatoriesController@index');
//Route::get('signatories', 'SignatoriesController@index');
Route::middleware('auth:sanctum')->post('signatoriesnew', 'SignatoriesController@store');
//Route::post('signatoriesnew', 'SignatoriesController@store');
Route::middleware('auth:sanctum')->put('signatoriesupdate/{id}', 'SignatoriesController@update');
//Route::put('signatoriesupdate/{id}', 'SignatoriesController@update');
Route::middleware('auth:sanctum')->delete('signatoriesdelete/{id}', 'SignatoriesController@delete');
//Route::delete('signatoriesdelete/{id}', 'SignatoriesController@delete');


Route::middleware('auth:sanctum')->get('employee', 'EmployeeController@index');
//Route::get('employee', 'EmployeeController@index');
//Route::middleware('auth:sanctum')->post('employee', 'EmployeeController@store');
Route::post('employee', 'EmployeeController@store' );
Route::middleware('auth:sanctum')->put('employee/updates/{id}', 'EmployeeController@updates');
//Route::put('employee/updates/{id}', 'EmployeeController@updates');


Route::middleware('auth:sanctum')->get('overview/{particular}/{startDate}/{endDate}', 'DashboardController@show');
//Route::get('overview/{particular}/{startDate}/{endDate}', 'DashboardController@show');
Route::middleware('auth:sanctum')->get('overviewfp/{particular}/{startDate}/{endDate}', 'DashboardController@showfp');
//Route::get('overviewfp/{particular}/{startDate}/{endDate}', 'DashboardController@showfp');
Route::middleware('auth:sanctum')->get('overviewstockpilecategory/{particular}/{startDate}/{endDate}', 'DashboardController@showstockpilecategory');
//Route::get('overviewstockpilecategory/{particular}/{startDate}/{endDate}', 'DashboardController@showstockpilecategory');
Route::middleware('auth:sanctum')->get('overviewstockpilerelease/{particular}/{startDate}/{endDate}', 'DashboardController@showstockpilerelease');
//Route::get('overviewstockpilerelease/{particular}/{startDate}/{endDate}', 'DashboardController@showstockpilerelease');
Route::middleware('auth:sanctum')->get('overviewbal/', 'DashboardController@showBalance');
//Route::get('overviewbal/', 'DashboardController@showBalance');
Route::middleware('auth:sanctum')->get('overviewtabular/{particular}/{startDate}/{endDate}', 'DashboardController@showtabularData');
//Route::get('overviewtabular/{particular}/{startDate}/{endDate}', 'DashboardController@showtabularData');
Route::middleware('auth:sanctum')->get('overviewtabularfp/{startDate}/{endDate}', 'DashboardController@showtabularDatafp');
//Route::get('overviewtabularfp/{startDate}/{endDate}', 'DashboardController@showtabularDatafp');
Route::middleware('auth:sanctum')->get('overviewexpirydate', 'DashboardController@showexpirydate');
//Route::get('overviewexpirydate/', 'DashboardController@showexpirydate');
Route::middleware('auth:sanctum')->get('overviewffpstatus', 'DashboardController@showffpstatus');
//Route::get('overviewffpstatus/', 'DashboardController@showffpstatus');
Route::middleware('auth:sanctum')->get('overviewrequeststatus', 'DashboardController@showrequeststatus');
//Route::get('overviewrequeststatus/', 'DashboardController@showrequeststatus');
Route::middleware('auth:sanctum')->get('overviewstockpile', 'DashboardController@showstockpile');
//Route::get('overviewstockpile/', 'DashboardController@showstockpile');
Route::middleware('auth:sanctum')->get('overviewstockpileoverall/{startDate}/{endDate}', 'DashboardController@showstockpileoverall');
//Route::get('overviewstockpileoverall/{startDate}/{endDate}', 'DashboardController@showstockpileoverall');
Route::middleware('auth:sanctum')->get('overviewupcomingexpiredstocks/', 'DashboardController@showupcomingexpiredstocks');
//Route::get('overviewupcomingexpiredstocks/', 'DashboardController@showupcomingexpiredstocks');


Route::middleware('auth:sanctum')->get('kit', 'KitController@index');
//Route::get('kit', 'KitController@index');
Route::middleware('auth:sanctum')->get('kit/view/{particular}', 'KitController@showkitcomposition');
//Route::get('kit/view/{particular}', 'KitController@showkitcomposition');
Route::middleware('auth:sanctum')->get('kit/viewitem/{particular}', 'KitController@showkitcompositionitem');
//Route::get('kit/viewitem/{particular}', 'KitController@showkitcompositionitem');
Route::middleware('auth:sanctum')->post('kit', 'KitController@store');
//Route::post('kit', 'KitController@store');
Route::middleware('auth:sanctum')->post('kitcomposition', 'KitController@storeKit');
//Route::post('kitcomposition', 'KitController@storeKit');
Route::middleware('auth:sanctum')->get('kit/edit/{id}', 'KitController@edit');
//Route::get('kit/edit/{id}',  'KitController@edit');
Route::middleware('auth:sanctum')->put('kit/update/{id}', 'KitController@update');
//Route::put('kit/update/{id}',  'KitController@update');
Route::middleware('auth:sanctum')->get('kit/composition', 'KitController@composition');
//Route::get('kit/composition',  'KitController@composition');
Route::middleware('auth:sanctum')->get('kit/list', 'KitController@listkit');
//Route::get('kit/list',  'KitController@listkit');

Route::middleware('auth:sanctum')->post('kit/list', 'KitListController@storeKitList');
//Route::post('kit/list',  'KitListController@storeKitList');
Route::middleware('auth:sanctum')->get('kitlist/edit/{id}', 'KitListController@editList');
//Route::get('kitlist/edit/{id}',  'KitListController@editList');
Route::middleware('auth:sanctum')->put('kit/updatecomponent/{id}', 'KitListController@listComponentupdate');
//Route::put('kit/updatecomponent/{id}',  'KitListController@listComponentupdate');
Route::middleware('auth:sanctum')->delete('kit/delete/{id}', 'KitListController@delete');
//Route::delete('kit/delete/{id}', 'KitListController@delete');

//Route::put('kit/list/update/{id}',  'KitController@updateList');

Route::middleware('auth:sanctum')->get('stockcard', 'StockCardController@index');
//Route::get('stockcard', 'StockCardController@index');


Route::middleware('auth:sanctum')->get('stockpilepreposition', 'StockpilePrepositionController@index');
//Route::get('stockpilepreposition', 'StockpilePrepositionController@index');
Route::middleware('auth:sanctum')->get('stockpileprepositionbalance', 'StockpilePrepositionController@showbalance');
//Route::get('stockpileprepositionbalance', 'StockpilePrepositionController@showbalance');
Route::middleware('auth:sanctum')->get('stockpileprepositionbreakdown', 'StockpilePrepositionController@showbreakdown');
//Route::get('stockpileprepositionbreakdown', 'StockpilePrepositionController@showbreakdown');

Route::middleware('auth:sanctum')->get('stockpileprepositionreleaseView', 'StockpilePrepositionReleaseController@index');
//Route::get('stockpileprepositionreleaseView', 'StockpilePrepositionReleaseController@index');
Route::middleware('auth:sanctum')->post('stockpileprepositionrelease', 'StockpilePrepositionReleaseController@store');
//Route::post('stockpileprepositionrelease', 'StockpilePrepositionReleaseController@store');

//
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',function (Request $request){
    $data = $request->validate([
        'email'=>'required',
        'password'=>'required',
    ]);

    $user = Employee::where('email', $request->email)->first();

    if (! $user ) {
        return response ([
            'email' =>['Provided Credentials are incorrect.']
        ], 404);
    }

    //return $user->createToken('my-token')->plainTextToken;
    $tokenResult = $user->createToken('authToken')->plainTextToken;
    return response()->json([
    'status_code' => 200,
    'access_token' => $tokenResult,
    'token_type' => 'Bearer',
    ]);
    //auth()->attempt($request->only('email','password'));
    //return auth()->user();
});

Route::post('logout',function(){
    auth()->logout();
    return response('logged out');
});
