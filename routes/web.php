<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GoldRateController;

// Public pages
Route::view('/', 'pages.home');
Route::view('/shop', 'pages.shop');
Route::view('/product/{id}', 'pages.product');
Route::view('/collections', 'pages.collections');
Route::view('/gold-saving-scheme', 'pages.gold-saving-scheme');

Route::get('/offers', [OfferController::class, 'userIndex']);

Route::get('/gold-rate', [GoldRateController::class, 'userIndex']);

Route::view('/book-appointment', 'pages.book-appointment');
Route::post('/book-appointment', [AppointmentController::class, 'store']);

Route::view('/store-locator', 'pages.store-locator');
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');


// Auth
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);


// Customer dashboard (must be logged in)
Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard.index');
    Route::view('/dashboard/my-plans', 'dashboard.my-plans');
    Route::view('/dashboard/new-plan', 'dashboard.new-plan');
    Route::view('/dashboard/pay-emi', 'dashboard.pay-emi');
    Route::view('/dashboard/payment-history', 'dashboard.payment-history');
    Route::view('/dashboard/gold-weight', 'dashboard.gold-weight');
    Route::view('/dashboard/closed-plans', 'dashboard.closed-plans');
    Route::view('/dashboard/notifications', 'dashboard.notifications');
    Route::view('/dashboard/profile', 'dashboard.profile');

});


// Admin dashboard (must be admin)
Route::middleware('admin')->group(function () {

    Route::view('/admin', 'admin.index');
    Route::view('/admin/customers', 'admin.customers');
    Route::view('/admin/plans', 'admin.plans');
    Route::view('/admin/payments', 'admin.payments');
    Route::view('/admin/products', 'admin.products');


    // Offers
    Route::get('/admin/offers', [OfferController::class, 'adminIndex']);

    Route::post('/admin/offers', [OfferController::class, 'store']);

    Route::get('/admin/offers/{id}/edit', [OfferController::class, 'edit']);

    Route::put('/admin/offers/{id}', [OfferController::class, 'update']);

    Route::get('/admin/offers/{id}/delete', [OfferController::class, 'destroy']);


    // Appointments
    Route::get('/admin/appointments', [AppointmentController::class, 'adminIndex']);


    // Gold Rate
    Route::get('/admin/gold-rate', [GoldRateController::class, 'adminIndex']);
    Route::post('/admin/gold-rate', [GoldRateController::class, 'store']);


    Route::view('/admin/reports', 'admin.reports');
    Route::view('/admin/settings', 'admin.settings');

});