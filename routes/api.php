<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

// Rutas públicas
Route::post('/login', [AuthController::class, 'login']);
Route::post('/users', [UserController::class, 'store']); // Crear usuario
// Rutas protegidas con JWT
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/users', [UserController::class, 'index']); // Listar usuarios
    Route::get('/users/{id}', [UserController::class, 'show']); // Obtener usuario
    Route::put('/users/{id}', [UserController::class, 'update']); // Actualizar usuario
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Eliminar usuario
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/user/{userId}', [TaskController::class, 'index']);
    Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});
