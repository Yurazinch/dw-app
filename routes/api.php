<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSeanseController;
use App\Http\Controllers\ApiPlaceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('seances', ApiSeanseController::class);

Route::apiResource('chairs', ApiPlaceController::class);