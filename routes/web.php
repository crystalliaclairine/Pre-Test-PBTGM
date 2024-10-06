<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// index profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
// create profile
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
// edit profile
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
// delete profile
Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');


// index student
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
// create student
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
// edit student
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
// delete student
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');