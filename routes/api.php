<?php

use app\Http\Controllers\API\V1\AdminController;
use App\Http\Controllers\API\V1\CategoryController;
use app\Http\Controllers\API\V1\MediaController;
use App\Http\Controllers\API\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
///Posts
Route::get("/posts",[PostController::class,"index"]);
Route::get("/post/{id}",[PostController::class,"show"]);
Route::post("/post",[PostController::class,"store"]);
Route::put("/post/{id}",[PostController::class,"update"]);
Route::delete("/post/{id}", [PostController::class, "destroy"]);

Route::patch("/post/{id}/replace",[PostController::class,"replace"]);
/// Medias
Route::get("/medias",[MediaController::class,"index"]);
Route::get("/media/{id}",[MediaController::class,"show"]);
Route::post("/media",[MediaController::class,"store"]);
Route::put("/media/{id}",[MediaController::class,"update"]);
Route::delete("/media/{id}", [MediaController::class, "destroy"]);
Route::post("/media",[MediaController::class,"store"]);
Route::patch("/media/{id}/replace",[MediaController::class,"replace"]);
//// category
Route::get("/categorys",[CategoryController::class,"index"]);
Route::get("/category/{id}",[CategoryController::class,"show"]);

Route::put("/category/{id}",[CategoryController::class,"update"]);
Route::delete("/category/{id}", [CategoryController::class, "destroy"]);
Route::post("/category",[CategoryController::class,"store"]);
Route::patch("/category/{id}/replace",[CategoryController::class,"replace"]);
///admin
Route::get("/admins",[AdminController::class,"index"]);
Route::get("/admin/{id}",[AdminController::class,"show"]);
Route::put("/admin/{id}",[AdminController::class,"update"]);
Route::delete("/admin/{id}", [AdminController::class, "destroy"]);
Route::post("/admin",[AdminController::class,"store"]);
Route::patch("/admin/{id}/replace",[AdminController::class,"replace"]);
