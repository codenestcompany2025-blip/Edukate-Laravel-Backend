<?php

use App\Http\Controllers\Auth\AuthController;
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


Route::prefix('/admin')->name('admin.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'indexLogin')->name('login')->defaults('guard', 'admin');
        Route::post('login', 'login')->name('login.submit')->defaults('guard', 'admin');
    });
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    })->middleware('auth:admin')->defaults('guard', 'admin')->name('dashboard');
});

Route::prefix('/instructor')->name('instructor.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'indexLogin')->name('login')->defaults('guard', 'instructor');
        Route::post('login', 'login')->name('login.submit')->defaults('guard', 'instructor');
    });
    Route::get('dashboard', function () {
        return view('instructor.dashboard.index');
    })->middleware('auth:instructor')->defaults('guard', 'instructor')->name('dashboard');
});

Route::prefix('/student')->name('student.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'indexLogin')->name('login')->defaults('guard', 'student');
        Route::post('login', 'login')->name('login.submit')->defaults('guard', 'student');
    });
    Route::get('dashboard', function () {
        return view('student.dashboard.index');
    })->middleware('auth:student')->defaults('guard', 'student')->name('dashboard');
});
