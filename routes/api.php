<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::get('/getProducts',[ProductController::class,'getProducts']);
Route::post('/addProduct',[ProductController::class,'addProduct']);
Route::get('/getProductDetails/{id}',[ProductController::class,'getProductDetails']);
Route::post('/updateProduct',[ProductController::class,'updateProduct']);
Route::get('/productDelete/{id}',[ProductController::class,'deleteProduct']);