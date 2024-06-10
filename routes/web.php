<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\GradeController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Alunos
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

// Cursos
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Módulos
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('modules.show');
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::put('/modules/{id}', [ModuleController::class, 'update'])->name('modules.update');
Route::delete('/modules/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');

// Notas
Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
Route::get('/grades/{id}', [GradeController::class, 'show'])->name('grades.show');
Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
Route::put('/grades/{id}', [GradeController::class, 'update'])->name('grades.update');
Route::delete('/grades/{id}', [GradeController::class, 'destroy'])->name('grades.destroy');
