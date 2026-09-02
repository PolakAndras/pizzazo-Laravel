<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
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

    $products = Product::get();
    $categories = Category::get(); 

    return view('welcome', compact('products', 'categories' ));
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

// termék oldala - > mindenki által látható 
Route::get('/product/{id}', [ProductController::class, 'productView'])->name('product');

// Kosár
Route::post('/cart/add', [CartController::class, 'add'])->name("cart-add");
Route::get('/cart/deleteall', [CartController::class, 'deleteAllCart'])->name("delete-All-Cart"); // Ha hazsnálni akarom akkor postra rakni 




