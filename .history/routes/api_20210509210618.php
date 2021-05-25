<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BucketController;
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
Route::post("/login",[UserController::class, 'login']);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
Route::post()
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/logout",[UserController::class, 'logout']);
    Route::get("/buckets",[BucketController::class, 'index']);
    Route::post('/create-bucket', [BucketController::class, 'store']);
    Route::get('/location', [LocationController::class, 'index']);
});