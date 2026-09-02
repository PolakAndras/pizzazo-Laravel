<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function add(Request $request){
        dd($request->all());

    }
}
