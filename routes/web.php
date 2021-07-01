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
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserProfileAdminController;

Route::get('/', [PageController::class, 'HomePage'])->name('HomePage');

Route::get('perfil-usuario', [UserProfileController::class,'index'])->middleware('auth')->name('user.profile');

Route::get('search',SearchController::class)->name('search');

Route::get('categorias', [PageController::class, 'show'])->name('CategoryPage');

Route::get('categoria/{categoria}', [PageController::class, 'showCategory'])->name('categoria.show');

Route::get('libro/{book}', [PageController::class, 'BookPage'])->name('books.show');

Route::get('carrito', [ShoppingCartController::class, 'index'])->name('shopping-cart');

//Rutas verificación email

Route::get('/email/verify', [EmailVerificationController::Class, 'notice'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::Class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

//Rutas creacion de ordenes

Route::middleware(['auth'])->group(Function(){

    Route::get('orden', [CreateOrderController::class, 'index'])->name('orden.index');
    
    Route::get('orden/crear', [CreateOrderController::class, 'create'])->name('orden.crear');

    Route::get('orden/{orden}', [CreateOrderController::class, 'show'])->name('orden.show');

    Route::get('orden/{orden}/recibo-pdf', [CreateOrderController::class, 'pdf'])->name('orden.pdf');

    Route::get('orden/{orden}/pagar', [CreateOrderController::class, 'payment'])->name('orden.payment');
    
    Route::get('orden/{orden}/pago-aprovado', [CreateOrderController::class, 'approved'])->name('orden.approved');
});

// Rutas administrador

Route::middleware(['auth','web'])->group(function () {

    Route::redirect('admin','admin/dashboard');

    Route::get('admin/perfil-usuario', [UserProfileAdminController::class,'index'])->name('admin.profile');

    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('admin/categorias', CategoryController::class);

    Route::get('admins/categorias/{categoria}/libros', [CategoryController::class, 'libros'])->name('categorias.libros');

    Route::resource('admin/editoriales', EditorialController::class);

    Route::get('admins/editoriales/{editorial}/libros', [EditorialController::class, 'libros'])->name('editoriales.libros');

    Route::resource('admin/autores', AuthorController::class);

    Route::get('admin/autores/{autor}/libros', [AuthorController::class,'libros'])->name('autores.libros');

    Route::post('admin/autores/{autor}/imagenes', [AuthorController::class, 'imagenes'])->name('admin.autores.imagenes');

    Route::resource('admin/libros', BookController::class);

    Route::post('admin/libros/{libro}/imagenes', [BookController::class, 'imagenes'])->name('admin.libros.imagenes');
    
    Route::resource('admin/usuarios', UserController::class);

    Route::resource('admin/ordenes-usuario', OrderAdminController::class);

});
