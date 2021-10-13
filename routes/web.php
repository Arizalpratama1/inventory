<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    
    ItemController,
    UnitController,
    JenisController,
    TransactionController,
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

Route::get('/stockmasuk',[TransactionController::class, 'stockin']);

Route::get('/stockkeluar', [TransactionController::class, 'stockout']);

Route::resource('/admin/unit', UnitController::class);
Route::get('/ListUnit', [UnitController::class, 'ListUnit'])->name('get.list.unit');
Route::post('/DetailUnit', [UnitController::class, 'DetailUnit'])->name('get.detail.unit');
Route::post('/UpdateUnit', [UnitController::class, 'UpdateUnit'])->name('get.update.unit');

Route::resource('/admin/jenis', JenisController::class);
Route::get('/ListJenis', [JenisController::class, 'ListJenis'])->name('get.list.jenis');
Route::post('/DetailJenis', [JenisController::class, 'DetailJenis'])->name('get.detail.jenis');
Route::post('/UpdateJenis', [JenisController::class, 'UpdateJenis'])->name('get.update.jenis');

Route::resource('/admin/item', ItemController::class);

