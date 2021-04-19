<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\catprodController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix'=>'category'],
    function(){
        Route::post('create',[categoryController::class,'store']);
        Route::get('all',[categoryController::class,'index']);
        Route::get('detail/{id}',[categoryController::class,'detail']);
        Route::post('update/{id}',[categoryController::class,'update']);
        Route::post('delete/{id}',[categoryController::class,'destroy']);
    });
Route::group([
    'prefix'=>'product'],
    function(){
        Route::post('create',[productController::class,'store']);
        Route::get('all',[productController::class,'index']);
        Route::get('detail/{id}',[productController::class,'detail']);
        Route::post('update/{id}',[productController::class,'update']);
        Route::post('delete/{id}',[productController::class,'destroy']);
    });
Route::group([
    'prefix'=>'category_product'],
    function(){
        Route::post('create',[catprodController::class,'store']);
        Route::get('all',[catprodController::class,'index']);
        Route::get('detail/{id}',[catprodController::class,'detail']);
        Route::post('update/{id}',[catprodController::class,'update']);
        Route::post('delete/{id}',[catprodController::class,'destroy']);
    });

    


