<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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

/*
    Announcements
*/
Route::prefix('announcements')
    ->controller(AnnouncementController::class)
    ->group(function () {
        Route::get('/', 'index');
});

Route::prefix('posts')  
    ->controller(PostController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/update/{id}', 'update');
        Route::get('/{id}', 'show');
        Route::delete('/{id}', 'destroy');
    });
