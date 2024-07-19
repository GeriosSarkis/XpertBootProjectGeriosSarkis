<?php

use app\Http\Controllers\API\V1\MediaController;
use app\Http\Controllers\API\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/posts",[PostController::class,"index"]);
Route::post("/post",[PostController::class,"store"]);
Route::put("/post/{id}",[PostController::class,"update"]);
Route::delete("/post/{id}", [PostController::class, "destroy"]);
Route::post("/media",[MediaController::class,"store"]);
