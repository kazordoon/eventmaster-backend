<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/events', EventController::class)->only(['index', 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/events', EventController::class)->only(['store']);
    Route::apiResource('/locals', LocalController::class);
    Route::apiResource('/event-categories', EventCategoryController::class);
});
