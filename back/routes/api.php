<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::post('upload/{id}/{option}', [\App\Http\Controllers\UploadController::class, 'upload']);
Route::group(['middleware'=>'auth:sanctum'],function () {
    Route::post('/me', [\App\Http\Controllers\UserController::class, 'me']);
    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::resource('sales', \App\Http\Controllers\SaleController::class);
    Route::post('salesGasto', [\App\Http\Controllers\SaleController::class, 'salesGasto']);
});
