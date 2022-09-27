<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'posts'], function () {
    Route::post('/store', [PostsController::class, 'store']);
    Route::get('/{id}', [PostsController::class, 'show']);
    Route::get('/edit/{id}', [PostsController::class, 'edit']);
    Route::put('/update/{id}', [PostsController::class, 'update']);
    Route::delete('/{id}', [PostsController::class, 'destroy']);
});

Route::group(['prefix' => 'websites'], function () {
    Route::post('/subscribe', [WebsiteController::class, 'subscribes']);

});
