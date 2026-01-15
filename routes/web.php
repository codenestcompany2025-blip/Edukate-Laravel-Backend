<?php

use App\Http\Controllers\Admin\Categories\CategoriesController;
use App\Http\Controllers\Admin\Courses\CoursesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\Instructors\InstructorsController;
use App\Http\Controllers\Admin\Students\StudentsController;
use App\Http\Controllers\Site\SiteController;
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

Route::prefix('edukate/')->controller(SiteController::class)->name('site.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/join', 'join')->name('join');
    Route::get('/course', 'course')->name('course');
    Route::get('/course/{id}/details', 'detail')->name('detail');
    Route::get('/feature', 'feature')->name('feature');
    Route::get('/team', 'team')->name('team');
    Route::get('/testimonial', 'testimonial')->name('testimonial');
    Route::post('/registerCourse', 'registerCourse')->name('registerCourse');
});
