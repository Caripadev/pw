<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FrontController;
use App\Http\Controllers\Api\admin\SerieController as AdminSerieController;
use App\Http\Controllers\Api\admin\UserController as AdminUserController;
use App\Http\Controllers\Api\admin\EquipoController as AdminEquipoController;
use App\Http\Controllers\Api\client\SerieController as ClientSerieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

// Más rutas para tu API
Route::prefix('v1')->group(function () {
    Route::get('/public/{slug}', [FrontController::class, 'serie']);
    Route::get('/auth/register', [AuthController::class, 'Registrer']);
    /*Route::get('/auth/login', [AuthController::class, 'Login']);
    Route::get('/auth/logout', [AuthController::class, 'Logout']); */
});
Route::group(['middleware' => 'auth:api'], function () {
    //authenticated routes
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    //routes for authenticated users
    Route::apiResource('/client/serie', ClientSerieController::class);
    //routes for authenticated admin users
    Route::apiResource('/admin/user', AdminUserController::class);
    Route::apiResource('/admin/serie', AdminSerieController::class);
    Route::apiResource('/admin/equipo', AdminEquipoController::class);

});