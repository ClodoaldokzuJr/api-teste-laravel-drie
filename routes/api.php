<?php

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;

Route::middleware('apiToken')->group(function () {
    Route::get('/documentos', [DocumentoController::class, 'index']);
    Route::post('/documentos', [DocumentoController::class, 'store']);
    Route::put('/documentos/{documento}', [DocumentoController::class, 'update']);
});