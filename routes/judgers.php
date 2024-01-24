<?php

use App\Http\Controllers\Judger\ProfileController;
use App\Http\Controllers\Judger\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    /* ***************************************** Profile ****************************** */
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('settings', [ProfileController::class, 'settings'])->name('settings');
    Route::put('settings', [ProfileController::class, 'updateSettings'])->name('settings.update');
    Route::get('documents', [ProfileController::class, 'documents'])->name('documents');
    Route::post('license', [ProfileController::class, 'license'])->name('license');
    Route::post('commercial', [ProfileController::class, 'commercial'])->name('commercial');
    Route::post('company-info', [ProfileController::class, 'companyInfo'])->name('company.info');
});
