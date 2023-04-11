<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/password/set', [AuthController::class, 'set_password']);
// Password Reset
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');

// User
Route::middleware('auth:sanctum')->post('/sanctum/token', [TokenController::class, 'token']);
Route::middleware('auth:sanctum')->prefix('/user')->group(function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/search/new/{company}', [UserController::class, 'search_new']);
    Route::get('/show/{user}', [UserController::class, 'show']);
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/resendInvitation', [UserController::class, 'resendInvitation']);
    Route::put('/update/{user}', [UserController::class, 'update']);
    Route::get('/destroy/{user}', [UserController::class, 'destroy']);

    Route::put('/new-account', [UserController::class, 'new_account']);
    Route::get('/select/{user}', [UserController::class, 'select']);
});
