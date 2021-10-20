<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    
    ItemController,
    UnitController,
    JenisController,
    TransactioninController,
    TransactionoutController,
    TertagihController,
    WarantyController,
    TertagihrinciController,
    WarantyrinciController
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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('/admin/transactionin', TransactioninController::class);

    Route::resource('/admin/transactionout', TransactionoutController::class);
    
    Route::resource('/admin/unit', UnitController::class);
    Route::get('/ListUnit', [UnitController::class, 'ListUnit'])->name('get.list.unit');
    Route::post('/DetailUnit', [UnitController::class, 'DetailUnit'])->name('get.detail.unit');
    Route::post('/UpdateUnit', [UnitController::class, 'UpdateUnit'])->name('get.update.unit');
    
    Route::resource('/admin/jenis', JenisController::class);
    Route::get('/ListJenis', [JenisController::class, 'ListJenis'])->name('get.list.jenis');
    Route::post('/DetailJenis', [JenisController::class, 'DetailJenis'])->name('get.detail.jenis');
    Route::post('/UpdateJenis', [JenisController::class, 'UpdateJenis'])->name('get.update.jenis');
    
    Route::resource('/admin/item', ItemController::class);
    
    Route::get('/beranda', [ItemController::class, 'beranda'])->name('home');
    
    Route::resource('/admin/tertagih', TertagihController::class);
    
    Route::resource('/admin/tertagihrinci', TertagihrinciController::class);
    
    // Route::get('/admin/tertagihrinci/create/{id}', TertagihrinciController::class , "create");
    
    Route::resource('/admin/waranty', WarantyController::class);
    
    Route::resource('/admin/warantyrinci', WarantyrinciController::class);
    
    Route::get('/home', [ItemController::class, 'beranda']);
});


Auth::routes();
