<?php

use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Courses\CoursesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\Instructors\InstructorsController;
use App\Http\Controllers\Admin\Students\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::view('/role-selection', 'auth.role-selection')->name('role.selection');
Route::view('/register', 'auth.register')->name('register');


Route::authenticate('admin', 'admin', 'admin');
Route::authenticate('student', 'student', 'student');
Route::authenticate('instructor', 'instructor', 'instructor');

/* Route::adminDash(StudentsController::class, 'students');
Route::adminDash(InstructorsController::class, 'instructors');
Route::adminDash(CoursesController::class, 'courses');
Route::adminDash(CategoriesController::class, 'categories'); */