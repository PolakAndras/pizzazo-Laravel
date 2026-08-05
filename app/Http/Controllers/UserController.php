<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



};