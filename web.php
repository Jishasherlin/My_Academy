<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ContactController;

Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('login',[AuthController::class, 'loginPost'])->name('login.post');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('register',[AuthController::class, 'registerPost'])->name('register.post');

// Everyone can see index
Route::get('/course/index', [CourseController::class, 'index'])->name('course.index');

// Admin-only CRUD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/course/{course}/update', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
});
// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/course/enroll/{course}', [CourseController::class, 'enroll'])->name('course.enroll');
});

Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::get('/mentor/index', [MentorController::class, 'index'])->name('mentor.index');

// Admin-only CRUD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/mentor/create', [MentorController::class, 'create'])->name('mentor.create');
    Route::post('/mentor', [MentorController::class, 'store'])->name('mentor.store');
    Route::get('/mentor/{mentor}/edit', [MentorController::class, 'edit'])->name('mentor.edit');
    Route::put('/mentor/{mentor}', [MentorController::class, 'update'])->name('mentor.update');
    Route::delete('/mentor/{mentor}', [MentorController::class, 'destroy'])->name('mentor.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/contact', function () {
        return view('contact'); // resources/views/contact.blade.php
    })->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('admin.dashboard');
});

