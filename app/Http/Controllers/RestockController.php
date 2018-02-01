<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestockController extends Controller
{
    public function items(){
    	return $this->belongsTo('App\Item');
    }
}
