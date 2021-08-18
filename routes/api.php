<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Movie\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {

    /**
     * Rotas de Autenticação do usuário
     */
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('refresh', [AuthController::class, 'refresh']);

});

Route::group(['middleware' => 'api'], function () {

    /**
     * Rotas de Tags de Filmes
     */
    Route::get('movie/tags', [TagController::class, 'index']);

});

