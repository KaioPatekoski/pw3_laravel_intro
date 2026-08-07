<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('home');
});

Route::get('/livros', [LivroController::class, 'index']);

Route::post('/livros', [LivroController::class, 'store']);