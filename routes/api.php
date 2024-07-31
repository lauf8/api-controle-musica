<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlbumController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('singers', SingerController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('albums', AlbumController::class);