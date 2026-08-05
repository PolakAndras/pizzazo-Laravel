<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
// regisztráció nézet
    function view(){
        return view('register');
    }
    
// regisztráció kezelés és validálás
function register(RegisterRequest $request){
    //dd($request->all());
        $validated = $request->validated();

        // Adatbázisba mentés és átirányítás
        User::create($validated);
    return redirect()->route('index')->with('Success', 'Sikeres Regisztráció!');
}




}
