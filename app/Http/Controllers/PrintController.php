<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Item;
use PDF;
use Carbon\Carbon;
class PrintController extends Controller
{
    public function receipt()
    {
    	$data = session('receipt');
    	session()->forget('receipt');
    	$pdf = PDF::loadView('receipt',['data'=>$data])->setPaper([0,0,300,400],'portrait');
    	return $pdf->stream();
    }

    public function sales(Request $request){
    	$data ="";
    	$var = [];
    	if($request->frequency == 1)
    	{
    		$data = Sale::whereMonth('created_at',$request->month)->whereYear('created_at',$request->year)->get();
    		$var['frequency'] = 'Monthly';
    		$var['value'] = Carbon::parse('2018-'.$request->month.'-01')->format('F') . ' ' . $request->year;
    	}
    	else{
    		$data = Sale::whereYear('created_at',$request->year)->get();
    		$var['frequency'] = 'Yearly';
    		$var['value'] = $request->year;
    	}

    	$pdf = PDF::loadView('admin.report.sales_report',['data'=>$data,'var'=>$var])->setPaper([0,0,612,792],'portrait');
    	return $pdf->stream();
    }

    public function inventory(){
        $data = Item::all();
        $pdf = PDF::loadView('admin.report.inventory_report',['data'=>$data])->setPaper([0,0,612,792],'portrait');
        return $pdf->stream();
    }
}
