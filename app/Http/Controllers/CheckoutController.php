<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class CheckoutController extends Controller
{
    function view(Request $request) {

        return view('checkout');
    }


    function add(Request $request){


$datas = $request->validate(
    [
       'name' => Config::get('validation.name'),
       'email' => 'required|email',
       'phone' => Config::get('validation.phone'),

       // Kötelező szállítási adatok
       'city' => Config::get('validation.city'),
       'street' => Config::get('validation.street'),
       'houseNumber' => Config::get('validation.houseNumber'),
       'zip' => Config::get('validation.zip'),

       // Nem kötelező
       'floor_door' => Config::get('validation.floor_door'),
       'doorbell' => Config::get('validation.doorbell'),
       'elseData' => Config::get('validation.elseData'),

       'payment' => Config::get('validation.payment'),
  ]);
        //Ez lenne a sessionhöz adás teszteléshez. Nem biztos, hogy kelleni fog
        //dd($datas); -> működik, megkapom.
        //$request->session()->put('datas', $datas);
        //return redirect()->back()->with('success', 'A rendelésed beérkezett hozzánk!');

        // Ez itt a felső kettő egyben
        // return redirect()->back()
        //     ->with('datas', $datas) // Itt adjuk hozzá a session-höz
        //     ->with('success', 'A rendelésed beérkezett hozzánk!');

       // dd($request->all());
       //dd($datas['city']);
       //dd(((object)$datas)->city);

       $city = ((object)$datas)->city;

       // 1. Csoportosítjuk a városokat tömbökbe
       $ingyenesVarosok = ['Nagykálló', 'Biri', 'Balkány', 'Nagyhalász', 'Napkor'];
       $fizetosVarosok  = ['Nyíregyháza', 'Újfehértó'];
       
       // 2. Ellenőrizzük a feltételeket
       if (in_array($city, $ingyenesVarosok)) {
           
           $shippingPrice = 0;
       
       } elseif (in_array($city, $fizetosVarosok)) {
           
           //dd('Lesz szállítási díj (+ 1450 Ft)'); // Fizetős szállítás
           $shippingPrice = 1450;
       
       } else {
           
            return redirect()->back()->with('error', 'Sajnos nem áll módunkban szállítani az adott településre!');
       
       }
        //dd($shippingPrice);
        // Ha minden rendben akkor lekérem próbából az adatokat és Sessionbe helyezem el azokat
        $request->session()->put('datas', $datas);
        $request->session()->put('shippingPrice', $shippingPrice);
        return redirect()->back()->with('success', 'A rendelésed beérkezett hozzánk!');

    }

}

