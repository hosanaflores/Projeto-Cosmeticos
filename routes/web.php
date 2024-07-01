<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/newproduct', function(){
    return view('product');
})->name('newproduct'); 

Route::get('/index', [ProductController::class, 'index'])->name('index');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('destroy');

Route::post('/products', [ProductController::class, 'store'])->name('store');

