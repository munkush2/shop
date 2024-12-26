<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\Shop\ShowController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\UpdateStatusController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/shop', [ShowController::class, '__invoke']);
    Route::prefix('admin')->group(function () {
        Route::get('/users', [AdminPanelController::class, '__invoke']);
        Route::post('/users/updatestatus', [UpdateStatusController::class, '__invoke']);
    });
});

Route::post('/register/registration', [RegisterController::class, '__invoke']);
Route::post('/login/authentification', [LoginController::class, '__invoke']);
