<?php


use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\Post_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// Custom Filament login routes
//Route::get('admin/login', [CustomLoginController::class, 'showLoginForm'])->name('filament.auth.login');
//Route::post('login', [CustomLoginController::class, 'login'])->name('filament.auth.login');
//Route::post('logout', [CustomLoginController::class, 'logout'])->name('filament.auth.logout');
