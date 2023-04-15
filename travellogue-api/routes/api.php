<?php

use App\Http\Controllers\LoginController;
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
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register',[LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::controller(PostController::class)->group(function(){
        Route::get('/posts', 'index');
        Route::post('/store/post', 'store');
    });
});

