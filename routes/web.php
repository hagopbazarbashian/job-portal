<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\PackageController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\ForgetpasswordController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Admin\TestMonialsController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminTermsController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminJobCategoryItem;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminOtherController;



Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('terms',[TermsController::class , 'index'])->name('terms');
Route::get('job_categories',[JobCategoryController::class , 'categories'])->name('job_categories');
Route::get('blog',[PostController::class , 'index'])->name('blog');
Route::get('blog/{slug}',[PostController::class , 'detail'])->name('post');
Route::get('faq',[FaqController::class , 'index'])->name('faq');
Route::get('privacy',[PrivacyController::class , 'index'])->name('privacy');
Route::get('contact',[ContactController::class , 'index'])->name('contact');
Route::post('submit_contact' , [ContactController::class , 'submit_contact'])->name('submit_contact');
Route::get('package',[PackageController::class , 'index'])->name('Package');
Route::get('login',[LoginController::class , 'index'])->name('login');
Route::get('signup',[SignupController::class , 'index'])->name('signup');
Route::get('forgetpassword',[ForgetpasswordController::class , 'index'])->name('forgetpassword');

Route::post('signup-company',[SignupController::class , 'company_submit'])->name('company_signup_submit');

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

    Route::get('/admin/faq-page' , [AdminFaqController::class , 'index_faq_home'])->name('admin_faq_page');
    Route::post('/admin/faq/{id}', [AdminFaqController::class, 'update_faq_home'])->name('admin_faq_page_update');

    Route::get('/admin/blog-page' , [AdminBlogController::class , 'index_blog_home'])->name('admin_blog_page');
    Route::post('/admin/blog/{id}', [AdminBlogController::class, 'update_blog_home'])->name('admin_blog_page_update');

    Route::get('/admin/terms-page' , [AdminTermsController::class , 'index_terms_home'])->name('admin_terms_page');
    Route::post('/admin/terms/{id}', [AdminTermsController::class, 'update_terms_home'])->name('admin_terms_update');

    Route::get('/admin/privacy-page' , [AdminPrivacyPageController::class , 'index_privacy_home'])->name('admin_privacy_page');
    Route::post('/admin/privacy/{id}', [AdminPrivacyPageController::class, 'update_privacy_home'])->name('admin_privacy_update');

    Route::get('/admin/contact-page' , [AdminContactController::class , 'index_contact_home'])->name('admin_contact_page');
    Route::post('/admin/contact/{id}', [AdminContactController::class, 'update_contact_home'])->name('admin_contact_update');

    Route::get('/admin/job-category-page' , [AdminJobCategoryItem::class , 'index_job_category_home'])->name('admin_job_category_page');
    Route::post('/admin/job-category-page/{id}', [AdminJobCategoryItem::class, 'update_job_category_home'])->name('admin_job_category_page_update');

    Route::get('/admin/admin-others-page' , [AdminOtherController::class , 'index'])->name('admin_others_page_page');
    Route::post('/admin/admin-others-page/{id}', [AdminOtherController::class, 'update'])->name('admin_others_page_page_update');





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

    Route::get('/admin/faq/view' , [AdminFaqController::class , 'index'])->name('admin_faq');
    Route::get('/admin/faq/add' , [AdminFaqController::class , 'create'])->name('admin_faq_create');
    Route::post('/admin/faq/store' , [AdminFaqController::class , 'store'])->name('admin_faq_store');
    Route::get('/admin/faq/edit/{id}' , [AdminFaqController::class , 'edit'])->name('admin_faq_edit');
    Route::post('/admin/faq/update/{id}' , [AdminFaqController::class , 'update'])->name('admin_faq_update');
    Route::get('/admin/faq/delete/{id}' , [AdminFaqController::class , 'delete'])->name('admin_faq_delete');

    Route::get('/admin/package/view' , [AdminPackageController::class , 'index'])->name('admin_package');
    Route::get('/admin/package/add' , [AdminPackageController::class , 'create'])->name('admin_package_create');
    Route::post('/admin/package/store' , [AdminPackageController::class , 'store'])->name('admin_package_store');
    Route::get('/admin/package/edit/{id}' , [AdminPackageController::class , 'edit'])->name('admin_package_edit');
    Route::post('/admin/package/update/{id}' , [AdminPackageController::class , 'update'])->name('admin_package_update');
    Route::get('/admin/package/delete/{id}' , [AdminPackageController::class , 'delete'])->name('admin_package_delete');


});
