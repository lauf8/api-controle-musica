<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Resouce
Route::apiResource('singers', SingerController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('albums', AlbumController::class);
Route::apiResource('tracks', TrackController::class);

//Albums
Route::get('/albums/{albumId}/tracks', [AlbumController::class, 'getTracks']);
Route::get('/albums/search', [AlbumController::class, 'search']);

//Track
Route::get('/tracks/search', [TrackController::class, 'search']);
