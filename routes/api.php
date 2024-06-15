<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// IMPORT CONTROLLER TO BE USE 
use App\Http\Controllers\Product\ProductController; 
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

Route::get('/product-list', [ProductController::class , 'productList']); 
Route::post('/product-store', [ProductController::class, 'productCreate']); 
Route::get('/product-details/{id}', [ProductController::class , 'productDetails']); 
Route::put('/product-update/{id}', [ProductController::class, 'productUpdate']); 
Route::delete('/product-delete/{id}', [ProductController::class, 'productDelete']); 


//SIMPLE IMPLEMENTATION OF CACHE IN LARAVEL  : FOR TESTING PURPOSE ONLY 
Route::get('/test-caching',[ProductController::class,'testCaching']); 
