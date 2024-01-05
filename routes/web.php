<?php
// routes/web.php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/fun', [ApiController::class, 'getCatImages'])->name('fun');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Grupa tras z prefixem '/home'
Route::middleware(['auth'])->prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Dodaj ścieżkę do metody addFood
    Route::post('/add-food', [HomeController::class, 'addFood'])->name('addFood');

    Route::get('/fridge', function () {
        // Pobierz jedzenie z sesji
        $foods = session('foods', []);

        return view('fridge', compact('foods'));
    })->name('fridge');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});









