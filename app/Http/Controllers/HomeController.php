<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
class HomeController extends Controller
{
    //
    public function index(){
    	$items = Item::all();
    	return view('home/home',compact('items'));
    }

    public function checkout(Request $request){
    	$data = [];
        $items =[];
        $sale = new Sale;
        $sale->amount = $request->amount;
    	foreach($request->id as $key=> $ids)
    	{
    		$item = Item::find($ids);
    		
            $items[$key]['name'] = $item->name;
    		$items[$key]['quantity'] = $request->quantity[$key];
            $items[$key]['unit_price'] = $item->new_price;
            $items[$key]['total'] = $request->quantity[$key] * $item->new_price;
            
            $item->stocks = $item->stocks - $request->quantity[$key];
            $item->save();
    	}
        $items = collect($items);
        $sale->amount_change = $request->amount - $items->sum('total');
        $sale->save();
        foreach($request->id as $key=> $ids)
        {
            $sale->items()->attach($ids,['quantity' => $request->quantity[$key]]);
        }
        $data = collect((object)['items' => $items, 'amount' => $request->amount,'date'=>Carbon::now(),'receipt_no' => $sale->id]);
    	session()->put('receipt',$data);
    	return redirect()->back();
    }

    public function login($guard=null){
        if(Auth::guard($guard)->check()){
            return redirect('/dashboard');
        }
        else
        {
            $user = User::all();
            if(!$user){
                $user = new User;
                $user->name = "Rod Maverick Cuartero";
                $user->email = 'admin@admin.com';
                $user->password = bcrypt('admin');
                $user->save();
            }
            return view('/login');
            
        }
        return view('/login');
    }

    public function prelogin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        } 
        else 
        {
            return redirect()->back()->with('message','email and password did not exist');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}