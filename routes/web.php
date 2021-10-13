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

Route::resource('/admin/unit', UnitController::class);
Route::get('/ListUnit', [UnitController::class, 'ListUnit'])->name('get.list.unit');
Route::post('/DetailUnit', [UnitController::class, 'DetailUnit'])->name('get.detail.unit');
Route::post('/UpdateUnit', [UnitController::class, 'UpdateUnit'])->name('get.update.unit');

Route::resource('/admin/jenis', JenisController::class);

Route::resource('/admin/item', ItemController::class);

