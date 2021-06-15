<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingCartController;

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

Route::get('/', [PageController::class, 'HomePage'])->name('HomePage');

Route::get('/categorias', [CategoryController::class, 'show'])->name('CategoryPage');

Route::get('libro/{book}', [PageController::class, 'BookPage'])->name('books.show');

Route::get('shopping-cart', [ShoppingCartController::class, 'index'])->name('shopping-cart');

Route::get('ordenes/crear', [CreateOrderController::class, 'index'])->middleware('auth')->name('ordenes.crear');
