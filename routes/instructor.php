<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\Lectures\LecturesController;
use Illuminate\Support\Facades\Route;

Route::prefix('instructor/dashboard')->controller(InstructorController::class)->name('instructor.')->middleware('auth:instructor')->group(function () {
    Route::get('/', 'index')->name('dashboard')->defaults('guard', 'instructor');
    Route::get('/courses', 'courses')->name('courses');
    Route::get('/course/{course}/students', 'students')->name('course.students');
    Route::resource('course.lectures', LecturesController::class);
});
