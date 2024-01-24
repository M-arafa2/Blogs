<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Models\Question;


Route::get('/', function () {
    $questions = Question::get();
    return view('welcome')->with('questions', $questions); 
   
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
