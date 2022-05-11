<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\DiaryFoodDetailController;
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

// Route::group(['prefix' => 'food'], function () {
//     Route::get('/', [FoodController::class, 'index']);
//     Route::get('/{food}', [FoodController::class, 'show']);
//     //Route::get('/search', [FoodController::class, 'search']);
// });

// Route::get('/search', [FoodController::class, 'search']);

//Route::get('/food/search/{name}', [FoodController::class, 'search']);

//AUTHENTICATION ROUTE
Route::post('/login', [AuthenticationController::class, 'login']);
//Route::get('/logout', [AuthenticationController::class, 'logout']);

// //DIARY ROUTE
// Route::post('/diary', [DiaryController::class, 'store']);
// Route::get('/diary', [DiaryController::class, 'index']);
// Route::get('/diary/detail', [DiaryController::class, 'show']);
// //Route::get('/diary/{diary}', [DiaryController::class, 'show']);

// //ADD FOOD ROUTE
// Route::post('/diary/food', [DiaryFoodDetailController::class, 'store']);

Route::group(['middleware' => 'auth:api'], function () {
    //FOOD ROUTE
    Route::group(['prefix' => 'food'], function () {
        Route::get('/', [FoodController::class, 'index']);
        Route::get('/{food}', [FoodController::class, 'show']);
        //Route::get('/search', [FoodController::class, 'search']);
    });

    Route::get('/search', [FoodController::class, 'search']);
    //AUTHENTICATION ROUTE
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    //DIARY ROUTE
    Route::post('/diary', [DiaryController::class, 'store']);
    Route::get('/diary', [DiaryController::class, 'index']);
    Route::get('/diary/detail', [DiaryController::class, 'show']);
    //Route::get('/diary/{diary}', [DiaryController::class, 'show']);

    //ADD FOOD ROUTE
    Route::post('/diary/food', [DiaryFoodDetailController::class, 'store']);
    Route::delete('/diary/food/{diaryFoodDetail}', [DiaryFoodDetailController::class, 'destroy']);
});

//Route::delete('/diary/food/{diaryFoodDetail}', [DiaryFoodDetailController::class, 'destroy']);
