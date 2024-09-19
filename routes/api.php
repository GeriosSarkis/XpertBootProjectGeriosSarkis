<?php

use app\Http\Controllers\API\V1\AdminController;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\CategoryController;
use app\Http\Controllers\API\V1\MediaController;
use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V1\TagController;
use App\Http\Controllers\API\V1\CategoryPostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//Login

Route::post("/login",[AuthController::class,"login"]);
/// LOgin

///Posts


/// POST Route///
Route::middleware('auth:sanctum')->group(function () {
    Route::post("/posts",[PostController::class,"store"]);
    Route::put("/posts/{id}",[PostController::class,"update"]);
    Route::delete("/posts/{id}", [PostController::class, "destroy"]);
    Route::patch("/posts/{id}/replace",[PostController::class,"replace"]);

});

Route::get("/posts",[PostController::class,"index"]);
Route::get("/posts/{id}",[PostController::class,"show"]);

/// Post Route
/// Media Route

Route::get("/media",[MediaController::class,"index"]);
Route::get("/media/{id}",[MediaController::class,"show"]);
Route::middleware('auth:sanctum')->group(function () {

    Route::put("/media/{id}",[MediaController::class,"update"]);
    Route::delete("/media/{id}", [MediaController::class, "destroy"]);
    Route::post("/media",[MediaController::class,"store"]);
    Route::patch("/media/{id}/replace",[MediaController::class,"replace"]);

});

/// Media Route
//// category
///
///

Route::middleware('auth:sanctum')->group(function () {


    Route::put("/categories/{id}",[CategoryController::class,"update"]);
    Route::delete("/categories/{id}", [CategoryController::class, "destroy"]);
    Route::post("/categories",[CategoryController::class,"store"]);
    Route::patch("/categories/{id}/replace",[CategoryController::class,"replace"]);

});
Route::get("/categories",[CategoryController::class,"index"]);
Route::get("/categories/{id}",[CategoryController::class,"show"]);

///admin

Route::middleware('auth:sanctum')->group(function () {

    Route::put("/admins/{id}",[AdminController::class,"update"]);
    Route::delete("/admins/{id}", [AdminController::class, "destroy"]);
    Route::post("/admins",[AdminController::class,"store"]);
    Route::patch("/admins/{id}/replace",[AdminController::class,"replace"]);

});
Route::get("/admins",[AdminController::class,"index"]);
Route::get("/admins/{id}",[AdminController::class,"show"]);

/////tags////
///

Route::middleware('auth:sanctum')->group(function () {

    Route::put("/tags/{id}",[TagController::class,"update"]);
    Route::delete("/tags/{id}", [TagController::class, "destroy"]);
    Route::post("/tags",[TagController::class,"store"]);
    Route::patch("/tags/{id}/replace",[TagController::class,"replace"]);
});
Route::get("/tags",[TagController::class,"index"]);
Route::get("/tags/{id}",[TagController::class,"show"]);

///////// Category Pot Flutter///



Route::get("/categories/{id}/posts", [CategoryPostsController::class, "index"]);
