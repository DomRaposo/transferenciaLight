<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;



Route::post('/login', [AuthController::class, 'login']);

Route::post('/', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {


    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::prefix('users')->group(function () {
        Route::get('/',        [UserController::class, 'index']);
        Route::get('/{id}',    [UserController::class, 'show']);
        Route::put('/{id}',    [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

});
