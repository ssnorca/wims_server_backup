<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dashboard;

class DashboardController extends Controller{
    public function index(){
        $result = DB::table('wims_stockcard_rawitem')
        ->orderByRaw('created_at DESC')
        ->get();
        return $result;
    }
    public function showBalance(){
        $result = DB::select(DB::raw("CALL sp_dashboard_overallBalance()"));
        return $result;
    }

    public function showtabularData($particular, $startDate, $endDate){
        $result = DB::select(DB::raw("CALL sp_tabular_nonfoodpack('$particular','$startDate','$endDate')"));
        return $result;
    }

    public function showtabularDatafp($startDate, $endDate){
        $result = DB::select(DB::raw("CALL sp_tabular_foodpack('$startDate','$endDate')"));
        return $result;
    }

    public function showfp($particular, $startDate, $endDate){
        $result = DB::select(DB::raw("CALL sp_dashboard_fpBalance('$particular','$startDate','$endDate')"));
        return $result;
    }
    
    public function show($particular, $startDate, $endDate){
        $result = DB::select(DB::raw("CALL sp_dashboard_itemBalance('$particular','$startDate','$endDate')"));
        return $result;
    }

    public function showffpstatus(){
        $result = DB::select(DB::raw("CALL sp_ffp_status()"));
        return $result;
    }

    public function showrequeststatus(){
        $result = DB::select(DB::raw("CALL sp_request_status()"));
        return $result;
    }

    public function showexpirydate(){
        $result = DB::table('view_expirydate')
        ->limit(10)
        ->get();
        return $result;
    }

    public function showupcomingexpiredstocks(){
        $result = DB::table('view_upcomingexpiredstockpile')
        ->limit(10)
        ->get();
        return $result;
    }

    public function showstockpile(){
        $result = DB::select(DB::raw("call sp_stockpile()"));
        return $result;
    }

    public function showstockpilecategory($particular, $startDate, $endDate){
        //$result = DB::select(DB::raw("CALL sp_stockpilecategory('$particular','$startDate','$endDate')"));
        $result = DB::select(DB::raw("CALL sp_stockpilebreakdown('$particular','$startDate','$endDate')"));
        return $result;
    }

    public function showstockpilerelease($particular, $startDate, $endDate){
        $result = DB::select(DB::raw("CALL sp_stockpilerelease('$particular','$startDate','$endDate')"));
        return $result;
    } //showstockpileoverall

    public function showstockpileoverall($startDate, $endDate){
        $result = DB::select(DB::raw("CALL sp_stockpilebreakdown_no_prov('$startDate','$endDate')"));
        return $result;
    }
}