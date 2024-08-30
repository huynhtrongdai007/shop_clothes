<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Admin\ContactController;


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

/**============Admin============ */

/** module user* */
Route::get('/admin-login', [UserController::class, 'login']);
Route::get('/admin-user', [UserController::class, 'index']);
Route::post('/admin-user-create', [UserController::class, 'create']);
Route::get('/admin-user-edit/{id}', [UserController::class, 'edit']);
Route::get('/admin-user-show/{id}', [UserController::class, 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);


Route::prefix( 'shop') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('product/{id}',[\App\Http\Controllers\Front\ShopController::class,'product']);
    Route::post('product/{id}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
    Route::get('category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);

});

Route::prefix('cart')->group(function() {
    Route::get('add',[\App\Http\Controllers\Front\CartController::class, 'add']);
    Route::get('/',[\App\Http\Controllers\Front\CartController::class, 'index']);
    Route::get('delete',[\App\Http\Controllers\Front\CartController::class, 'delete']);
    Route::get('destroy',[\App\Http\Controllers\Front\CartController::class, 'destroy']);
    Route::get('update',[\App\Http\Controllers\Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function() {
    Route::get('',[\App\Http\Controllers\Front\CheckOutController::class, 'index']);
    Route::post('/',[\App\Http\Controllers\Front\CheckOutController::class, 'addOrder']);
    Route::get('/result',[\App\Http\Controllers\Front\CheckOutController::class, 'result']);
    Route::get('/vnPayCheck',[\App\Http\Controllers\Front\CheckOutController::class, 'vnPayCheck']);
});

Route::prefix( 'acc') -> group(function (){
    Route::get('login',[AccountController::class,'login']);
    Route::get('register',[AccountController::class,'register']);
    Route::post('login',[AccountController::class,'checkLogin']);
    Route::post('register',[AccountController::class,'postRegister']);
    Route::get('logout',[AccountController::class,'logout']);

});
Route::prefix('my-order') -> group (function ()
{
    Route::get('/',[AccountController::class,'myOrderIndex']);
    Route::get('{id}',[AccountController::class,'myOrderShow']);
});



Route::prefix( 'blog') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\BlogController::class,'blog']);
    Route::get('{id}',[\App\Http\Controllers\Front\BlogController::class,'show']);

});

Route::prefix( 'contact') -> group(function (){
    Route::get('',[\App\Http\Controllers\Front\ContactController::class,'contact']);
    Route::post('store',[\App\Http\Controllers\Front\ContactController::class,'store']);
});

Route::prefix( 'page') -> group(function (){
    Route::get('details',[\App\Http\Controllers\Front\PageController::class,'details']);
    Route::get('shoppingcart',[\App\Http\Controllers\Front\PageController::class,'shoppingcart']);
    Route::get('checkout',[\App\Http\Controllers\Front\PageController::class,'checkout']);
    Route::get('faq',[\App\Http\Controllers\Front\PageController::class,'faq']);
});


//Admin
Route::prefix( 'admin')-> middleware('CheckAdminLogin') -> group(function (){
    Route::redirect('', 'admin/user');

    Route::resource('user', UserController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('product/{product_id}/image', ProductImageController::class);
    Route::resource('product/{product_id}/detail', ProductDetailController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('blog_category', BlogController::class);   
    Route::resource('contact', ContactController::class);    

    Route::prefix('login') -> group(function (){
       Route::get('',[HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
       Route::post('',[HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout',[HomeController::class,'logout']);
});
