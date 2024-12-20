<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CRUDController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/mahasiswa', [CRUDController::class, 'tampil']);
    Route::delete('/mahasiswa/{id}', [CRUDController::class, 'delete']);
    Route::put('/mahasiswa/{id}', [CRUDController::class, 'update']);
    Route::post('/mahasiswa', [CRUDController::class, 'add']);
    Route::post('/logout', [AuthController::class, 'logout']);
});