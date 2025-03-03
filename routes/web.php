<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


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
