<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;

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

Route::middleware(['api'])->prefix('v1')->group(function() {

    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/news', [NewsController::class, 'index']); //I put this API unprotected because usually people don't need to login to view the news and comments
    
    //checking if the role is superadmin/admin
    Route::middleware(['auth:api', 'checkrole:superadmin,admin'])->group(function() {
        Route::post('/news', [NewsController::class, 'store']);
        Route::put('/news/{news}', [NewsController::class, 'update']);
        Route::delete('/news/{news}', [NewsController::class, 'destroy']);
    });

    Route::middleware(['auth:api'])->group(function() {
        Route::post('/logout', [LoginController::class, 'logout']);
        Route::post('/news/{news}/comments', [CommentController::class, 'store']);
    });
});
