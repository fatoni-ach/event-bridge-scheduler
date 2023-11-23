<?php

use App\Http\Controllers\DeleteEventBridgeController;
use App\Http\Controllers\SaveEventBridgeController;
use App\Http\Controllers\CreateEventBridgeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create-event-bridge', CreateEventBridgeController::class);
Route::post('/save-method', SaveEventBridgeController::class);
Route::get('/delete-method', DeleteEventBridgeController::class);
