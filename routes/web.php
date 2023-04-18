<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController; 
use App\Http\Controllers\Admin\AdminProfileController;




Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('terms',[TermsController::class , 'index'])->name('terms');

// PayPal Payment
Route::post('paypal/payment' , [PayPallController::class , 'payment'])->name('payment');
Route::get('paypal/success' , [PayPallController::class , 'success'])->name('paypal_success');
Route::get('paypal/cancel' , [PayPallController::class , 'cancel'])->name('paypal_cancel');
// End Pypal


/* Admin */
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset-password');
Route::post('/admin/forget-password-submit' , [AdminLoginController::class, 'forget_password_submit'])->name('forget-password-submit');
Route::post('/admin/reset-password-submit/{token}/{email}', [AdminLoginController::class, 'reset_password_submit'])->name('reset-password-submit');
Route::get('/admin/edit-profile' , [AdminProfileController::class , 'index'])->name('admin_edit_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
