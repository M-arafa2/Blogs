<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('products.show');
Route::view('/about', 'front.about')->name('about');
Route::view('/terms-of-use', 'front.terms-of-use')->name('terms-of-use');
