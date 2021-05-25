<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
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

// Public Routes

Route::post("/register",[UserController::class, 'register']);
Route::post("/register",[UserController::class, 'login']);
Route::post("/register",[UserController::class, 'logout']);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
    
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/location', [LocationController::class, 'index']);
});