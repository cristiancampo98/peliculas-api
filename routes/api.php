<?php

use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\FilmAPIController;
use App\Http\Controllers\API\RatingAPIController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getFilmsByCat/{id}', [FilmAPIController::class, 'getFilmsByCat']);
Route::get('getFilmsByName/{name}', [FilmAPIController::class, 'getFilmsByName']);
Route::apiResource('categories', CategoryAPIController::class)->only('index');
Route::apiResource('films', FilmAPIController::class)->only('index', 'store');
Route::apiResource('rating', RatingAPIController::class)->only('index', 'store');
