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

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/show', [App\Http\Controllers\API\LoanController::class, 'show']);
    Route::post('/loan', [App\Http\Controllers\API\LoanController::class, 'loan']);
    Route::post('/approve', [App\Http\Controllers\API\LoanController::class, 'approved']);
    Route::post('/pay', [App\Http\Controllers\API\LoanController::class, 'pay']);
});