<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\MediaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get("/posts",[PostController::class,"index"]);
Route::post("/post",[PostController::class,"store"]);
Route::put("/post/{id}",[PostController::class,"update"]);
Route::delete("/post/{id}", [PostController::class, "destroy"]);
Route::post("/media",[MediaController::class,"store"]);