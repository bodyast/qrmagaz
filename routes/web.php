<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

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


Route::match(['get'], '/', [IndexController::class, 'index']);
Route::match(['get'], '/account/login', [IndexController::class, 'loginform']);
Route::match(['get'], '/registration', [IndexController::class, 'registrationform']);
Route::match(['post'], '/register', [Auth::class, 'register'])->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard/{user_id}', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/{user_id}/myqrcode', [App\Http\Controllers\DashboardController::class, 'myqrcode'])->name('myqrcode');
Route::get('/dashboard/{user_id}/myqrcode/newqrcode', [App\Http\Controllers\SimpleQRcodeController::class, 'generate'])->name('generate');
Route::get('/dashboard/{user_id}/myqrcode/delete', [App\Http\Controllers\SimpleQRcodeController::class, 'delete'])->name('delete');


/* Дашборд */

Route::get('/dashboard/{user_id}/mymenu', [App\Http\Controllers\DashboardController::class, 'mymenu'])->name('mymenu');
Route::get('/dashboard/{user_id}/mymenu/newcategory', [App\Http\Controllers\DashboardController::class, 'newcategory'])->name('newcategory');
Route::get('/dashboard/{user_id}/mymenu/delcategory', [App\Http\Controllers\DashboardController::class, 'delcategory'])->name('delcategory');
Route::get('/dashboard/{user_id}/mymenu/addproduct', [App\Http\Controllers\DashboardController::class, 'addproduct'])->name('addproduct');
Route::post('/dashboard/{user_id}/mymenu/addproductmodal', [App\Http\Controllers\DashboardController::class, 'addproductmodal'])->name('addproductmodal');
Route::post('/dashboard/{user_id}/mymenu/redycatmodal', [App\Http\Controllers\DashboardController::class, 'redycatmodal'])->name('redycatmodal');
Route::get('/dashboard/{user_id}/mymenu/addcatmodal', [App\Http\Controllers\DashboardController::class, 'addcatmodal'])->name('addcatmodal');
Route::get('/dashboard/{user_id}/mymenu/editprod', [App\Http\Controllers\DashboardController::class, 'editprod'])->name('editprod');
Route::get('/dashboard/{user_id}/mymenu/delprods', [App\Http\Controllers\DashboardController::class, 'delprods'])->name('delprods');
Route::get('/dashboard/{user_id}/mymenu/delproduct', [App\Http\Controllers\DashboardController::class, 'delproduct'])->name('delproduct');

Route::get('/dashboard/{user_id}/activmenu', [App\Http\Controllers\DashdordActivMenuController::class, 'index'])->name('indexactivmenu');
Route::get('/dashboard/{user_id}/activmenu/getlist', [App\Http\Controllers\DashdordActivMenuController::class, 'getlist'])->name('getlist');

/* Qe Code Сканер  */

Route::get('/{key}-{user_id}/menu', [App\Http\Controllers\QrUserController::class, 'newclient'])->name('newclient');
Route::get('/menu/getproduct/{key}', [App\Http\Controllers\QrUserController::class, 'getProducts'])->name('getProducts');
Route::get('/menu/product/{key}/{id}', [App\Http\Controllers\QrUserController::class, 'product'])->name('ClientProduct');
