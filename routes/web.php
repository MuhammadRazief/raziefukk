<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');


// Login__________________________________________________
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'actionlogin'])->name('actionlogin');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('user',[AuthController::class,'index'])->name('user.index');
Route::get('user/create',[AuthController::class,'create'])->name('user.create');
Route::post('user/create',[AuthController::class,'store'])->name('user.store');
Route::delete('user/delete/{id}',[AuthController::class,'destroy'])->name('user.destroy');
Route::get('user/edit/{id}',[AuthController::class,'edit'])->name('user.edit');
Route::put('user/edit/{id}',[AuthController::class,'update'])->name('user.update');
// ________________________________________________________________________________



// Produk________________________________________________
Route::get('/produk',[ProdukController::class,'index'])->name('produk.index');
Route::get('/produk/create',[ProdukController::class,'create'])->name('produk.create');
Route::post('/produk/create',[ProdukController::class,'store'])->name('produk.store');
Route::delete('/produk/delete/{id}',[ProdukController::class,'destroy'])->name('produk.destroy');
Route::get('/produk/edit/{id}',[ProdukController::class,'edit'])->name('produk.edit');
Route::put('/produk/edit/{id}',[ProdukController::class,'update'])->name('produk.update');
Route::put('/produk/{id}/update-stok', [ProdukController::class, 'updateStok'])->name('produk.updateStok');
// ________________________________________________________________________________    
// Transaksi________________________________________________
Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi.index');
Route::get('/transaksi/create',[TransaksiController::class,'create'])->name('transaksi.create');
Route::get('/export-transaksi', [ExportExcelController::class, 'export'])->name('export.transaksi');
Route::get('/transaksi/{id}/lihat', [TransaksiController::class, 'lihatStruk'])->name('transaksi.lihat');
// ________________________________________________________________________________

