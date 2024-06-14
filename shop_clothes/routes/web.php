<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AccountController;
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
    return view('front.index');
});
Route::prefix( 'shop') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\ShopController::class,'index']);
});

Route::get('shop/product/{id}',[\App\Http\Controllers\Front\ShopController::class,'product']);



Route::prefix( 'acc') -> group(function (){
    Route::get('login',[AccountController::class,'login']);
    Route::get('register',[AccountController::class,'register']);
    Route::post('login',[AccountController::class,'checkLogin']);
    Route::post('register',[AccountController::class,'postRegister']);
    Route::get('logout',[AccountController::class,'logout']);
});



Route::prefix( 'blog') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\BlogController::class,'blog']);
});

Route::prefix( 'contact') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\ContactController::class,'contact']);
});

Route::prefix( 'acc') -> group(function (){
    Route::get('logout',[\App\Http\Controllers\Front\AccountController::class,'logout']);
});
Route::prefix( 'page') -> group(function (){
    Route::get('details',[\App\Http\Controllers\Front\PageController::class,'details']);
    Route::get('shoppingcart',[\App\Http\Controllers\Front\PageController::class,'shoppingcart']);
    Route::get('checkout',[\App\Http\Controllers\Front\PageController::class,'checkout']);
    Route::get('faq',[\App\Http\Controllers\Front\PageController::class,'faq']);
});
