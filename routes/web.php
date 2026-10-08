<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Models\Department;

Route::get('/', function () {
    return view('welcome');
});


// Login
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);


// Register
Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);


// Dashboard
Route::get('/dashboard', function () {

    $user = Auth::user();

    return view('dashboard', compact('user'));

})->middleware(['auth', 'can:access-dashboard'])->name('dashboard');


// Application Routes
Route::middleware('auth')->group(function () {

    // Department Management
    Route::middleware('can:access-department')->group(function () {
        Route::resource('departments', DepartmentController::class);
    });

    // User Management
    Route::middleware('can:access-user')->group(function () {
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });

    // Role Management
    Route::middleware('can:access-role')->group(function () {
        Route::resource('roles', \App\Http\Controllers\RoleController::class);
    });

    // Leave Management
    Route::middleware('can:access-leave')->group(function () {

        // Employee + Admin Leave Management
        Route::get('/leave', [LeaveController::class, 'index'])
            ->name('leave.index');

        // Employee - Apply for Leave
        Route::get('/leave/create', [LeaveController::class, 'create'])
            ->name('leave.create');

        Route::post('/leave', [LeaveController::class, 'store'])
            ->name('leave.store');

        // Admin - Approve Leave
        Route::post(
            '/leave/{leaveRequest}/approve',
            [LeaveController::class, 'approve']
        )->name('leave.approve');

        // Admin - Reject Leave
        Route::post(
            '/leave/{leaveRequest}/reject',
            [LeaveController::class, 'reject']
        )->name('leave.reject');

    });

});


// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');