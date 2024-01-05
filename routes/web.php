<?php
// routes/web.php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FridgeController; // Dodaj nowy kontroler

Route::get('/fun', [ApiController::class, 'getCatImages'])->name('fun');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Dodaj trasę do metod w FridgeController
    Route::get('/fridge', [FridgeController::class, 'showFridge'])->name('fridge');
    Route::post('/fridge/add-food', [FridgeController::class, 'addFood'])->name('addFood');
    Route::get('/fridge/take-food/{foodIndex}', [FridgeController::class, 'takeFood'])->name('takeFood');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});











