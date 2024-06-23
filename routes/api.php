<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/contact-messages', [ContactMessageController::class, 'store']);
Route::get('/contact-messages', [ContactMessageController::class, 'index']);
Route::delete('/contact-messages/{id}', [ContactMessageController::class, 'destroy']);

Route::post('/citas', [CitaController::class, 'store']);
Route::get('/citas', [CitaController::class, 'index']); 
Route::delete('/citas/{id}', [CitaController::class, 'destroy']);

Route::post('/articles', [ArticleController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}', [UserController::class, 'index']);

