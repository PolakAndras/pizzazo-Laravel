<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{

//login kezelés
function login(Request $request) {
    $loginresult = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

    if (!$loginresult) {
        return redirect()->back()->with('error', 'Sikertelen belépés! ');
    } 
    else {
         //dd($loginresult, Auth::check(), Auth::user());;
            return redirect()->route('index')->with('success', 'Sikeres belépés!');
    }
}
//logout
function logout(){
    Auth::logout();
    return redirect()->route('index');
}

//profil oldal
function profileView(){
    return view('profile');
}


function profileDetails(){
    return view('profileDetails');
}


function profileDetailsChange(Request $request){

    $request->validate(
         [
            'name' => Config::get('validation.name'),
            'email' => Config::get('validation.email') . ',' . auth()->user()->id,
            'password' => str_replace("required", "nullable", Config::get('validation.password') ), 
            'phone' => Config::get('validation.phone'),

            // Kötelező szállítási adatok
            'zip' => Config::get('validation.zip'),
            'city' => Config::get('validation.city'),
            'street' => Config::get('validation.street'),
            'houseNumber' => Config::get('validation.houseNumber'),

            // Nem kötelező
            'floor_door' => Config::get('validation.floor_door'),
            'doorbell' => Config::get('validation.doorbell'),
            'elseData' => Config::get('validation.elseData'),

            'accepted_terms' => Config::get('validation.accepted_terms'),
        ]);

        // Ne frissitse a továbbiakat az adatbázisban
        $request->user()->update($request->except([
        'password',
        'password_confirmation',
        'email_confirm',
        'accepted_terms'
        ]));

        // Ha csak jelszór módosítana és abba ír valamit akkor menjen a validáció
        if($request->password) {
            $request->user()->update($request->only('password'));
        }

           return redirect()->back()->with('success', 'Az adataid módosítása sikeres volt');

}

};