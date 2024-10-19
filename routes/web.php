<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::redirect('/', '/scan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //profiles
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/scan',  [AttendanceController::class, 'index'])->name('scan');

    Route::get('/students', [StudentsController::class, 'index'])->name('students');
    Route::get('/students/addstudent', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students/addstudent', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/profile/{id}', [StudentsController::class, 'show'])->name('student.show');

    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendacne.store');
    Route::get('/attendance', [AttendanceController::class, 'show'])->name('attendance.call');

    Route::get('/classes', [ClassesController::class, 'index'])->name('classes');
    Route::get('/classes/add', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('/classes/add', [ClassesController::class, 'store'])->name('classes.store');



    
});


require __DIR__.'/auth.php';
