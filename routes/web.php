<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    
    ItemController,
    UnitController,
    JenisController,
};

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

Route::get('/beranda', function () {
    return view('beranda');
});
Route::get('/stockmasuk', function () {
    return view('stockin');
});
Route::get('/stockkeluar', function () {
    return view('stockout');
});

Route::resource('/admin/unit', UnitController::class);

Route::resource('/admin/jenis', JenisController::class);

Route::resource('/admin/item', ItemController::class);

