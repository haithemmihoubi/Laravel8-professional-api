<?php

use App\Http\Controllers\V1\AlbumController;
use App\Http\Controllers\V1\ImageManipulationController;
use App\Models\ImageManipulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('v1')->group(function () {

    Route::apiResource('/album', AlbumController::class);
    Route::get('/image', [ImageManipulationController::class, 'index']);
    Route::get('/image/{image}', [ImageManipulationController::class, 'show']);
    Route::post('/image/resize', [ImageManipulationController::class, 'resize']);

    Route::get('/image/by-album/{album}', [ImageManipulationController::class, 'byAlbum']);

    Route::delete('/image/{image}', [ImageManipulationController::class, 'destroy']);
});

