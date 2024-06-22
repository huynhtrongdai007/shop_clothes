<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
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
    return view('welcome');
});


/**============Admin============ */

/** module user* */
Route::get('/admin-login', [UserController::class, 'login']);
Route::get('/admin-user', [UserController::class, 'index']);
Route::post('/admin-user-create', [UserController::class, 'create']);
Route::get('/admin-user-edit/{id}', [UserController::class, 'edit']);
Route::get('/admin-user-show/{id}', [UserController::class, 'show']);
/** module brand* */

Route::get('/admin-brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/admin-brand-create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/admin-brand-store', [BrandController::class, 'store'])->name('store.brand');
Route::get('/admin-brand-edit/{id}', [BrandController::class, 'edit'])->name('edit.brand');
Route::get('/admin-brand-destroy/{id}', [BrandController::class, 'destroy'])->name('destroy.brand');
/** module brand* */
Route::get('/admin-catetory', [CategoryController::class, 'index'])->name('index.category');
Route::get('/admin-category-create', [CategoryController::class, 'create'])->name('create.catetory');
Route::post('/admin-catetory-store', [CategoryController::class, 'store'])->name('store.category');
Route::get('/admin-catetory-edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('update.category');
Route::get('/admin-catetory-destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
Route::get('/softdele/category/{id}',[CategoryController::class,'destroy'])->name('soft.delete');
Route::get('/category/restore/{id}',[CategoryController::class,'restore'])->name('restore');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('delete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('front.index');
});
//Route::get('',[\App\Http\Controllers\Front\HomeComtroller::class,'index'])->name('front.index');

Route::prefix( 'shop') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\ShopController::class,'index']);
});

Route::get('shop/product/{id}',[\App\Http\Controllers\Front\ShopController::class,'product']);



Route::prefix( 'acc') -> group(function (){
    Route::get('login',[AccountController::class,'login']);
    Route::get('register',[AccountController::class,'register']);
    Route::post('login',[AccountController::class,'CustomerLogin']);
    Route::post('register',[AccountController::class,'postRegister']);
    Route::get('logout',[AccountController::class,'logout']);
});



Route::prefix( 'blog') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\BlogController::class,'blog']);
});

Route::prefix( 'contact') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\ContactController::class,'contact']);
});

Route::prefix( 'page') -> group(function (){
    Route::get('details',[\App\Http\Controllers\Front\PageController::class,'details']);
    Route::get('shoppingcart',[\App\Http\Controllers\Front\PageController::class,'shoppingcart']);
    Route::get('checkout',[\App\Http\Controllers\Front\PageController::class,'checkout']);
    Route::get('faq',[\App\Http\Controllers\Front\PageController::class,'faq']);
});
