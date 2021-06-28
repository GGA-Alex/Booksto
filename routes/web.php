<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateOrderController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [PageController::class, 'HomePage'])->name('HomePage');

Route::get('/busqueda', [PageController::class, 'show'])->name('CategoryPage');

Route::get('libro/{book}', [PageController::class, 'BookPage'])->name('books.show');

Route::get('carrito', [ShoppingCartController::class, 'index'])->name('shopping-cart');

Route::get('ordenes/crear', [CreateOrderController::class, 'index'])->middleware('auth')->name('ordenes.crear');



// Rutas administrador

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('/admin/categorias', CategoryController::class);

    Route::resource('/admin/editoriales', EditorialController::class);

    Route::resource('/admin/autores', AuthorController::class);

    Route::resource('/admin/libros', BookController::class);

    Route::post('admins/libros/{libro}/imagenes', [BookController::class, 'imagenes'])->name('admin.libros.imagenes');

});
