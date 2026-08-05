<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
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

//regisztráció
Route::get('/register', [GuestController::class, 'view'])->name('register');
Route::post('/register', [GuestController::class, 'register'])->name('register-post');

//login és logout
Route::post('/login/', [UserController::class, 'login'])->name('login-post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout-post');

// profil dolgok
Route::get('/profile', [UserController::class, 'profileView'])->name('profile');

Route::get('/profile/adataim', [UserController::class, 'profileDetails'])->name('profile-details');
Route::post('/profile/adataim', [UserController::class, 'profileDetailsChange'])->name('profile-details-post');
