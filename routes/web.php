<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateOrderController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;


Route::get('/', [PageController::class, 'HomePage'])->name('HomePage');

Route::get('search',SearchController::class)->name('search');

Route::get('categorias', [PageController::class, 'show'])->name('CategoryPage');

Route::get('categoria/{categoria}', [PageController::class, 'showCategory'])->name('categoria.show');

Route::get('libro/{book}', [PageController::class, 'BookPage'])->name('books.show');

Route::get('carrito', [ShoppingCartController::class, 'index'])->name('shopping-cart');

Route::get('ordenes/crear', [CreateOrderController::class, 'index'])->middleware('auth')->name('ordenes.crear');

Route::get('ordenes/{orden}/pagar', [CreateOrderController::class, 'payment'])->middleware('auth')->name('ordenes.pagar');



// Rutas administrador

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('/admin/categorias', CategoryController::class);

    Route::resource('/admin/editoriales', EditorialController::class);

    Route::resource('/admin/autores', AuthorController::class);

    Route::resource('/admin/libros', BookController::class);

    Route::post('admins/libros/{libro}/imagenes', [BookController::class, 'imagenes'])->name('admin.libros.imagenes');

});
