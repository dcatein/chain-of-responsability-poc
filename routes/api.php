<?php

use App\Http\Controllers\CreateSubscriptionChainController;
use App\Http\Controllers\CreateSubscriptionController;
use App\Http\Controllers\CreateSubscriptionHandlerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post(uri: '/subscription-simple', action: CreateSubscriptionController::class);
Route::post(uri: '/subscription-chain', action: CreateSubscriptionChainController::class);
Route::post(uri: '/subscription-handler', action: CreateSubscriptionHandlerController::class);
