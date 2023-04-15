<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});



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
Route::post('/admin/forget-password-submit' , [AdminLoginController::class, 'forget_password_submit'])->name('forget-password-submit');