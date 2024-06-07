<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']); 
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//alunos
Route::get('/student', [StudentController::class, 'index'])->name('student');