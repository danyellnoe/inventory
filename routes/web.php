<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoresController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'index'])->name('front');
Route::get('/products', [ProductController::class, 'index'])->name('inventory');
Route::get('/stores', [StoresController::class, 'index'])->name('stores');
Route::post('/comment', [CommentController::class, 'store'])->name('storeComment');
