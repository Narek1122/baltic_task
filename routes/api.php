<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;


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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});

Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'product'

], function ($router) {
    Route::get('', [ProductController::class,'index']);
    Route::post('', [ProductController::class,'store']);
    Route::put('/{id}', [ProductController::class,'update']);
    Route::delete('/{id}', [ProductController::class,'destroy']);

    Route::group([
        'middleware' => 'is_role:admin',
    ], function ($router) {
        Route::patch('/{id}', [ProductController::class,'updateArticle']);
    });

});
