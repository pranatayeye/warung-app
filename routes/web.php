<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

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
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/stok', [StockController::class,'index']);
Route::get('/stok/store', [StockController::class,'store']);
Route::get('/stok/search', [StockController::class,'search']);
Route::get('/stok/update/{id}', [StockController::class,'update']);
Route::get('/stok/delete/{id}', [StockController::class,'destroy']);