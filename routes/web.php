<?php

use App\Http\Livewire\Product;
use App\Http\Livewire\Products\Store;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/products', Product::class)->name('products');

Route::group(['prefix' => '/product'], function () {
    Route::get('/add', Store::class)->name('add_product');
});