<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public routes

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/brokers', [BrokerController::class, 'index']);
Route::get('/brokers/{broker}', [BrokerController::class, 'show']);
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/{property}', [PropertyController::class, 'show']);


//prptected routes

Route::group(['middlware' => ['auth:sanctum']], function() {

    Route::apiResource('/brokers', BrokerController::class)->only([
        'store', 'update', 'destroy'
    ]);

    Route::apiResource('/properties', PropertyController::class)->only([
        'store', 'update', 'destroy'
    ]);
    Route::get('logout', [AuthController::class, 'logout']);

});
