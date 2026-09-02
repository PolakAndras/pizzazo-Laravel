<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function add(Request $request){
        //dd($request->all());

        //dd($request->extras); //array:2 [ "extra sajt" => "400"  "kukorica" => "250" ] ->tömb vagy null

        //1. lépésnek muszáj végigmenni az extras tömbön és összeadni azok értékét, hogy a subtotalhoz hozzá tudjam adni
       //A foreach miatt kell hogy egy üres tömbbe tegyem ha nem létezik, különben hibát dob ha marad az alapméretezett null érték
        $extras = $request->extras ?? [] ;

        $extrastotal = 0;

        foreach ($extras as $extraName => $extraPrice) {
            $extrastotal  += $extraPrice;
        }


        $productData = [
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,

            'product_price' => $request->product_price,
            'extra_size_price' => $request->pizza_size_price,  // Ez null lesz ha nincs ilyenje
            'extras' => $request->extras, //Ez egy tömb 
            'note' => $request->note,
            'quantity' => $request->quantity,
            'subtotal' => ($request->product_price +  $request->pizza_size_price + $extrastotal  ) * $request->quantity,
        ];

        //dd($productData);

        //A kosár sessionbe helyezése
        $request->session()->put('cart.'.$request->product_id, $productData);
        return redirect()->route('index')->with('success', 'A terméket sikeresen a kosárba helyeztük!');
    }

    //Minden kosár elem törlése
    function deleteAllCart(Request $request) {
        $request->session()->forget('cart');
        return redirect()->back();
    }
}



