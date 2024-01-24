<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
    
    
});

Route::post('cart/submit', [CartController::class, 'submit']);

Route::apiResource('products', ProductController::class)->only('index', 'show');
Route::apiResource('cart', CartController::class);
Route::delete('cart', [CartController::class, 'destroy']);
// Route::post('cart/submit', [CartController::class, 'submit']);
