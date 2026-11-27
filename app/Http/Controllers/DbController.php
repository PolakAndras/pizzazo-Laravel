<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DbController extends Controller
{
    function view(){
        $products = Product::get();
        $users = User::get();
        

        return view('dbsPage', compact('products', 'users'));
    }
}
