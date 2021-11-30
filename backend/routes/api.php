<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

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

//Public routes
Route::post( '/register', [AuthController::class, 'register'] );
Route::post( '/login', [AuthController::class, 'login'] );
Route::post( '/logout', [AuthController::class, 'logout'] );

Route::get( '/posts', [PostController::class, 'index'] );

//Protected routes
Route::group( ['middleware' => ['auth:sanctum']], function () {
	Route::post( '/logout', [AuthController::class, 'logout'] );

	Route::get( '/auth/me', [ProfileController::class, 'getUser'] );
	Route::post( '/user', [ProfileController::class, 'updateProfile'] );

	Route::post( '/new-post', [PostController::class, 'store'] );

} );