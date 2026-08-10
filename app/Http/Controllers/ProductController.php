<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function productView(Request $request, $id){
       $product = Product::find($id);
        return view('product', compact('product'));
    }
}
