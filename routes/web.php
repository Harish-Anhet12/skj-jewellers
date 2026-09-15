<?php

use Illuminate\Support\Facades\Route;

// Public pages
Route::view('/', 'pages.home');
Route::view('/shop', 'pages.shop');
Route::view('/product/{id}', 'pages.product');
Route::view('/collections', 'pages.collections');
Route::view('/gold-saving-scheme', 'pages.gold-saving-scheme');
Route::view('/offers', 'pages.offers');
Route::view('/gold-rate', 'pages.gold-rate');
Route::view('/book-appointment', 'pages.book-appointment');
Route::view('/store-locator', 'pages.store-locator');
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');

// Customer dashboard
Route::view('/dashboard', 'dashboard.index');
Route::view('/dashboard/my-plans', 'dashboard.my-plans');
Route::view('/dashboard/new-plan', 'dashboard.new-plan');
Route::view('/dashboard/pay-emi', 'dashboard.pay-emi');
Route::view('/dashboard/payment-history', 'dashboard.payment-history');
Route::view('/dashboard/gold-weight', 'dashboard.gold-weight');
Route::view('/dashboard/closed-plans', 'dashboard.closed-plans');
Route::view('/dashboard/notifications', 'dashboard.notifications');
Route::view('/dashboard/profile', 'dashboard.profile');

// Admin dashboard
Route::view('/admin', 'admin.index');
Route::view('/admin/customers', 'admin.customers');
Route::view('/admin/plans', 'admin.plans');
Route::view('/admin/payments', 'admin.payments');
Route::view('/admin/products', 'admin.products');
Route::view('/admin/offers', 'admin.offers');
Route::view('/admin/gold-rate', 'admin.gold-rate');
Route::view('/admin/reports', 'admin.reports');
Route::view('/admin/settings', 'admin.settings');
