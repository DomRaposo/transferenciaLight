<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);       // Listar todos os usuários
    Route::post('/', [UserController::class, 'store']);      // Criar novo usuário
    Route::get('/{id}', [UserController::class, 'show']);    // Mostrar usuário específico
    Route::put('/{id}', [UserController::class, 'update']);  // Atualizar usuário
    Route::delete('/{id}', [UserController::class, 'destroy']); // Deletar usuário
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

