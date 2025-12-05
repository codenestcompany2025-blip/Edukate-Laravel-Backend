<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Courses\CoursesController;
use App\Http\Controllers\Admin\Instructors\InstructorsController;
use App\Http\Controllers\Admin\StudentCourse\StudentCourseController;
use App\Http\Controllers\Admin\Students\StudentsController;
use App\Http\Controllers\Admin\Testimonials\TestimonialsController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('instructors', InstructorsController::class);
    Route::resource('students', StudentsController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('student_courses', StudentCourseController::class);
    Route::resource('testimonials', TestimonialsController::class);

    Route::prefix('/profile')->controller(AdminController::class)->name('profile.')->group(function () {
        Route::get('/', 'profile')->name('index');
        Route::get('/edit', 'editProfile')->name('edit');
        Route::post('/update', 'updateProfile')->name('update');
    });
});
