<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UiController;
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

Route::get('/', [UiController::class, 'index']);

Route::get('/adminlogin', [ProductController::class, 'index']);
Route::post('/admin', [ProductController::class, 'admin']);

Route::get('/create', [ProductController::class, 'create'])->middleware('admin');
Route::post('/createpost', [ProductController::class, 'createpost'])->middleware('admin');
Route::get('/show', [ProductController::class, 'show'])->middleware('admin');
Route::delete('/delete/{product:id}/', [ProductController::class, 'destory'])->middleware('admin');
Route::get('/edit/{product:id}/', [ProductController::class, 'edit'])->middleware('admin');
Route::patch('/edit/{product:id}', [ProductController::class, 'update'])->middleware('admin');
Route::post('/logout', [ProductController::class, 'logout'])->middleware('admin');

//order
Route::get('/order', [ProductController::class, 'order'])->middleware('admin');
Route::delete('/order/{order:id}', [ProductController::class, 'destoryOrder'])->middleware('admin');
