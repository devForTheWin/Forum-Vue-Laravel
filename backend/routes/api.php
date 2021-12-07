<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::middleware( 'auth:api' )->get( '/user', function (Request $request) {
	return $request->user();
} );

//Public routes
Route::post( '/register', [AuthController::class, 'register'] );
Route::post( '/login', [AuthController::class, 'login'] );
Route::post( '/logout', [AuthController::class, 'logout'] );

Route::get( '/categories', [CategoryController::class, 'index'] );
Route::get( '/categories/{slug}', [CategoryController::class, 'showPosts'] );
Route::get( '/categories/{slug}/{postId}', [CategoryController::class, 'show'] );

Route::get( '/posts', [PostController::class, 'index'] );
Route::get( '/posts/{id}', [PostController::class, 'show'] );

//Protected routes
Route::group( ['middleware' => ['auth:sanctum']], function () {
	Route::post( '/logout', [AuthController::class, 'logout'] );

	Route::get( '/auth/me', [ProfileController::class, 'getUser'] );
	Route::post( '/user', [ProfileController::class, 'updateProfile'] );

	Route::post( '/new-post', [PostController::class, 'store'] );

	Route::post( '/posts/like/{post}', [PostController::class, 'likes'] );

} );
