<?php

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
    Route::post('/store', 'PostsController@store');
    Route::get('/{id}', 'PostsController@show');
    Route::post('/edit/{id}', 'PostsController@edit');
    Route::put('/update/{id}', 'PostsController@update');
    Route::delete('/{id}', 'PostsController@destroy');
});

Route::group(['prefix' => 'websites'], function () {
    Route::post('/subscribe', 'WebsiteController@subscribes');

});
