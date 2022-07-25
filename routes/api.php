<?php

use App\Http\Controllers\ProductController;
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

//To fetch all products from products table
Route::get('product',[ProductController::class,'index']);

//To add a product in products table with validation
Route::post('productstore',[ProductController::class,'store']);

//To update a product in products table
Route::put('productupdate/{id}',[ProductController::class,'update']);

//To delete a product from products table
Route::delete('productdelete/{id}',[ProductController::class,'destroy']);

//To find a specific product from products table
Route::get('productfind/{id}',[ProductController::class,'show']);
