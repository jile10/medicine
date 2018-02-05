<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Sale;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){
    	$items = Item::where('stocks','<',10)->get();
    	$sales = array();
    	for($x=1; $x<13;$x++)
    	{
    		$sale = Sale::whereYear('created_at','=',Carbon::now()->format('Y'))->whereMonth('created_at',$x)->get();
    		$sales[$x-1] = $sale->sum('amount') - $sale->sum('amount_change');
    	}
    	return view('admin/dashboard',compact('items','sales'));
    }
}
