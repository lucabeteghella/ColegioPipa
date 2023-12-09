<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)
    ->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout');
    });

Route::prefix('posts')
    ->middleware('auth:sanctum')
    ->controller(PostController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/update/{id}', 'update');
        Route::get('/{id}', 'show');
        Route::delete('/delete/{id}', 'destroy');
    });

Route::prefix('users')
    ->middleware('auth:sanctum')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store')->withoutMiddleware('auth:sanctum');
        Route::post('/update/{id}', 'update');
        Route::get('/{id}', 'show');
        Route::delete('/delete/{id}', 'destroy');
    });
