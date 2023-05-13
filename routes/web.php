<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Admin\TestMonialsController;
use App\Http\Controllers\Admin\AdminPostController;




Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('terms',[TermsController::class , 'index'])->name('terms');
Route::get('blog',[PostController::class , 'index'])->name('blog');
Route::get('job_categories',[JobCategoryController::class , 'categories'])->name('job_categories');

// PayPal Payment
Route::post('paypal/payment' , [PayPallController::class , 'payment'])->name('payment');
Route::get('paypal/success' , [PayPallController::class , 'success'])->name('paypal_success');
Route::get('paypal/cancel' , [PayPallController::class , 'cancel'])->name('paypal_cancel');
// End Pypal


/* Admin */
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset-password');
Route::post('/admin/forget-password-submit' , [AdminLoginController::class, 'forget_password_submit'])->name('forget-password-submit');
Route::post('/admin/reset-password-submit/{token}/{email}', [AdminLoginController::class, 'reset_password_submit'])->name('reset-password-submit');

/* Admin */
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/edit-profile' , [AdminProfileController::class , 'index'])->name('admin_edit_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
    Route::get('/admin/home-page' , [AdminHomePageController::class , 'index'])->name('admin_home_page');
    Route::post('/admin/home/update/{id}', [AdminHomePageController::class, 'update'])->name('admin_home_update');
    Route::get('/admin/job-category/view' , [AdminJobCategoryController::class , 'index'])->name('admin_job_category');
    Route::get('/admin/job-category/add' , [AdminJobCategoryController::class , 'create'])->name('admin_job_category_create');
    Route::post('/admin/job-category/store' , [AdminJobCategoryController::class , 'store'])->name('admin_job_category_store');
    Route::get('/admin/job-category/edit/{id}' , [AdminJobCategoryController::class , 'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job-category/update/{id}' , [AdminJobCategoryController::class , 'update'])->name('admin_job_category_update');
    Route::get('/admin/job-category/delete/{id}' , [AdminJobCategoryController::class , 'delete'])->name('admin_job_category_delete');

    Route::get('/admin/why-choose-item/view' , [AdminWhyChooseController::class , 'index'])->name('admin_why_choose_item');
    Route::get('/admin/why-choose-item/add' , [AdminWhyChooseController::class , 'create'])->name('admin_why_choose_item_create');
    Route::post('/admin/why-choose-item/store' , [AdminWhyChooseController::class , 'store'])->name('admin_why_choose_item_store');
    Route::get('/admin/why-choose-item/edit/{id}' , [AdminWhyChooseController::class , 'edit'])->name('admin_why_choose_item_edit');
    Route::post('/admin/why-choose-item/update/{id}' , [AdminWhyChooseController::class , 'update'])->name('admin_why_choose_item_update');
    Route::get('/admin/why-choose-item/delete/{id}' , [AdminWhyChooseController::class , 'delete'])->name('admin_why_choose_item_delete');


    Route::get('/admin/test-monials/view' , [TestMonialsController::class , 'index'])->name('admin_test_monials');
    Route::get('/admin/test-monials/add' , [TestMonialsController::class , 'create'])->name('admin_test_monials_create');
    Route::post('/admin/test-monials/store' , [TestMonialsController::class , 'store'])->name('admin_test_monials_store');
    Route::get('/admin/test-monials/edit/{id}' , [TestMonialsController::class , 'edit'])->name('admin_test_monials_edit');
    Route::post('/admin/test-monials/update/{id}' , [TestMonialsController::class , 'update'])->name('admin_test_monials_update');
    Route::get('/admin/test-monials/delete/{id}' , [TestMonialsController::class , 'delete'])->name('admin_test_monials_delete');

    Route::get('/admin/post/view' , [AdminPostController::class , 'index'])->name('admin_post');
    Route::get('/admin/post/add' , [AdminPostController::class , 'create'])->name('admin_post_create');
    Route::post('/admin/post/store' , [AdminPostController::class , 'store'])->name('admin_post_store');
    Route::get('/admin/post/edit/{id}' , [AdminPostController::class , 'edit'])->name('admin_post_edit');
    Route::post('/admin/post/update/{id}' , [AdminPostController::class , 'update'])->name('admin_post_update');
    Route::get('/admin/post/delete/{id}' , [AdminPostController::class , 'delete'])->name('admin_post_delete');

});
