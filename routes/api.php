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
 
// APPYLING ROUTE NAME BEST PRACTICES 
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); 
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); 
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); 

//SIMPLE IMPLEMENTATION OF CACHE IN LARAVEL  : FOR TESTING PURPOSE ONLY 
Route::get('/test-caching',[ProductController::class,'testCaching']); 
