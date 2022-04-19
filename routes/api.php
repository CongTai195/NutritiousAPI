<?php

use App\Http\Controllers\FoodController;
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

Route::group(['prefix' => 'food'], function () {
    Route::get('/', [FoodController::class, 'index']);
    Route::get('/{food}', [FoodController::class, 'show']);
    Route::post('/search', [FoodController::class, 'search']);
    // Route::put('/{id}', 'ProductController@updateView')->name('updateView');
    // Route::get('/user/search', 'ProductController@search')->name('search');
});