<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'user'])->name('user.dashboard');
    Route::get('/course/{id}', [CourseController::class, 'showDetail'])->name('course.detail');
    Route::get('/transactions/create/{courseId}', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm');
    Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/payment/{transactionId}', [TransactionController::class, 'payment'])->name('transactions.payment');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');
        Route::resource('courses', CourseController::class);
        Route::resource('instructors', InstructorController::class);
        Route::resource('qualifications', QualificationController::class);
        Route::resource('members', MemberController::class);
        Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');

    });
});
