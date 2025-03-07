<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin-page', function () {
        // return view('admin.dashboard'); 
        return view('layouts.admin_layouts.admin_ContainPage');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () { 
        Route::resource('products', ProductController::class);
        Route::delete('/products/image-delete/{id}', [ProductController::class, 'deleteImage'])->name('products.image.delete');

    });
});