<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BiographyController;
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

Route::post('register/', [AuthController::class, 'registerUser']);

Route::post('login/', [AuthController::class, 'logInUser']);

Route::apiResource('biography', BiographyController::class);

Route::apiResource('powerstart', BiographyController::class);

Route::apiResource('superhero', BiographyController::class);
