<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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


// Admin template
Route::get('/admin-login', [UserController::class, 'login']);
Route::get('/admin-user', [UserController::class, 'index']);
Route::get('/admin-user-create', [UserController::class, 'create']);
Route::get('/admin-user-edit/{id}', [UserController::class, 'edit']);
Route::get('/admin-user-show/{id}', [UserController::class, 'show']);



