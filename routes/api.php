<?php

use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'blog', 'middleware' => 'lang'], function(){
    Route::get('/index',[BlogController::class,'index']);
    Route::get('/show/{id}',[BlogController::class,'index']);

});

Route::group(['prefix' => 'contact', 'middleware' => 'lang'], function(){
    Route::post('/store',[ContactController::class,'store']);


});
