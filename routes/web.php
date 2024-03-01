<?php

use App\Http\Controllers\ProductTypesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(ProductTypesController::class)
    ->prefix('product-type')
    ->name('product-type.')
    ->group(function () {
       Route::get('/', 'index',)->name('list-product-types');
       Route::get('/{productType}', 'show')->name('show-product-type');
       Route::put('/{productType}', 'update')->name('update-product-type');

       Route::post('/create', 'store',)->name('store-product-types');
    });

Route::get('/', function () {
    return view('welcome');
});
