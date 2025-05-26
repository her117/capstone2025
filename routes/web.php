<?php

use App\Http\Controllers\addproduct;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Transaksi;
use App\Http\Controllers\CartController;
use App\Models\product;
use App\Models\products;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome',['title'=>'Beranda Dashboard']);
});


Route::get('/transaksi', function () {
    return view('transaksi',['title'=>'Transaksi']);
});

Route::get('/stok', function () {
    return view('stok',['title'=>'Stok']);
});

Route::get('/laporan', function () {
    return view('laporan',['title'=>'Laporan']);
});




// Route baru controller
Route::post('/stock/stockout', [StockController::class, 'storeout'])->name('stock.storeout');
Route::get('/stock/stockout', [StockController::class, 'out'])->name('stock.out');
Route::post('/stock/stockopname', [StockController::class, 'storeopname'])->name('stock.storeopname');
Route::get('/stock/stockopname', [StockController::class, 'opname'])->name('stock.opname');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

Route::resource('produks', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('stock', StockController::class);
Route::resource('transaksi',Transaksi::class);
Route::resource('customer',CustomerController::class);
