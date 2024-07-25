<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
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

//Route::get('/admin-brand', [BrandController::class, 'index'])->name('index.brand');
//Route::get('/admin-brand-create', [BrandController::class, 'create'])->name('brand.create');
//Route::post('/admin-brand-store', [BrandController::class, 'store'])->name('store.brand');
//Route::get('/admin-brand-edit/{id}', [BrandController::class, 'edit'])->name('edit.brand');
//Route::get('/admin-brand-destroy/{id}', [BrandController::class, 'destroy'])->name('destroy.brand');
//Route::get('/softdele/brand/{id}',[BrandController::class,'destroy'])->name('soft.delete.brand');
//Route::get('/brand/restore/{id}',[BrandController::class,'restore'])->name('restore.brand');
//Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('delete.brand');
///** module Category* */
//Route::get('/admin-catetory', [CategoryController::class, 'index'])->name('index.category');
//Route::get('/admin-category-create', [CategoryController::class, 'create'])->name('create.catetory');
//Route::post('/admin-catetory-store', [CategoryController::class, 'store'])->name('store.category');
//Route::get('/admin-catetory-edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
//Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('update.category');
//Route::get('/admin-catetory-destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
//Route::get('/softdele/category/{id}',[CategoryController::class,'destroy'])->name('soft.delete');
//Route::get('/category/restore/{id}',[CategoryController::class,'restore'])->name('restore');
//Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('delete');
///** module Product* */
//Route::get('/admin-product', [ProductController::class, 'index'])->name('index.product');
//Route::get('/admin-create-product', [ProductController::class, 'create'])->name('create.product');
//Route::post('/admin-product-store', [ProductController::class, 'store'])->name('store.product');
//Route::get('/admin-product-edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
//Route::post('/product/update/{id}',[ProductController::class,'update'])->name('update.product');
//Route::get('/admin-product-destroy/{id}', [ProductController::class, 'destroy'])->name('destroy.product');
//Route::get('/softdele/product/{id}',[ProductController::class,'destroy'])->name('soft.delete.product');
//Route::get('/product/restore/{id}',[ProductController::class,'restore'])->name('restore.product');
//Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('delete.product');
//Route::get('/product/show/{id}',[ProductController::class,'show'])->name('show.product');
///** module Product iamge* */
//
//Route::get('/product/{id}/images',[ProductImageController::class,'index'])->name('index.product.image');
//Route::get('/product_images/{id}',[ProductImageController::class,'destroy'])->name('destroy.product.image');
//Route::get('/product_images/edit/{id}',[ProductImageController::class,'edit'])->name('edit.product_image');
//Route::post('/product_images/update/{id}',[ProductImageController::class,'update'])->name('update.product_image');


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

    Route::prefix('login') -> group(function (){
       Route::get('',[HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
       Route::post('',[HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout',[HomeController::class,'logout']);
});
