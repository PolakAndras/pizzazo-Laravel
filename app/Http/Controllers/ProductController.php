<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function productView(Request $request, $id){
       $product = Product::find($id);
       
     
        $sizes = (json_decode($product->options, true));

//Ez lenne a kidolgozása
// foreach($sizes as $jsonOptions => $options) {
//     if($jsonOptions === "sizes") {
//         //dd($options);
//         foreach($options as $option =>$sizePrice){
//             dump($option);
//             dump($sizePrice);
//         };
//     }
//}




        return view('product', compact('product'));
    }
}
