<?php

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;

Route::middleware('apiToken')->group(function () {
    Route::get('/documentos', [DocumentoController::class, 'index']);
    Route::post('/documentos', [DocumentoController::class, 'store']);
    Route::put('/documentos/{documento}', [DocumentoController::class, 'update']);
    Route::get('/livros', [LivroController::class, 'index']);
    Route::post('/livros', [LivroController::class, 'store']);
    Route::get('/livros/{id}', [LivroController::class, 'show']);
    Route::put('/livros/{id}', [LivroController::class, 'update']);
    Route::delete('/livros/{id}', [LivroController::class, 'destroy']);
    Route::post('/livros/{livro}/indices', [IndiceController::class, 'store']);
});