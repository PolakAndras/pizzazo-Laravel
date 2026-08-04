<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');


Route::get('/register', [GuestController::class, 'view'])->name('register');
Route::post('/register', [GuestController::class, 'register'])->name('register-post');


Route::post('/login', [GuestController::class, 'login'])->name('login-post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout-post');
