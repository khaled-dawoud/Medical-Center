<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AwardsController;
use App\Http\Controllers\Admin\ClinicController as AdminClinicController;
use App\Http\Controllers\Admin\DoctorDescController as AdminDoctorDescController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeatuerController;
use App\Http\Controllers\Admin\FeatuerDescController as AdminFeatuerDescController;
use App\Http\Controllers\Admin\SearchDoctorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routs
Route::prefix('admin')->name('admin.')->middleware('auth', 'CheckUserType')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [AdminController::class, 'edit_profile'])->name('edit_profile');
    Route::post('/stor-profile/{id}', [AdminController::class, 'store_profile'])->name('store_profile');
    Route::post('/update-password', [AdminController::class, 'update_password'])->name('update_password');
    Route::resource('speciality', AdminClinicController::class);
    Route::resource('featuer', FeatuerController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('education', EducationController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('award', AwardsController::class);
});


// Site Routs
Route::controller(SiteController::class)->name('site.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/all-blogs', 'all_blogs')->name('all_blogs');
    Route::get('/all-blogs/{id}', 'blog_details')->name('blog_details');
    Route::get('/doctor_details/{id}', 'doctor_details')->name('doctor_details');
    Route::post('/add-review', 'add_review')->name('add_review');
});

//Search Doctor Routs
Route::controller(SearchDoctorController::class)->group(function () {
    Route::get('/search-doctor', 'Search_Doctor')->name('Search_Doctor');
    Route::post('/search-doctor/{id}', 'Search_Doctor_update')->name('Search_Doctor_update');
});

//Featuer Description Routs
Route::controller(AdminFeatuerDescController::class)->group(function () {
    Route::get('/featuer-description', 'featuer_description')->name('featuer_description');
    Route::post('/featuer-description-update/{id}', 'featuer_description_update')->name('featuer_description_update');
});

//Doctor Description Routs
Route::controller(AdminDoctorDescController::class)->group(function () {
    Route::get('/doctor-description', 'doctor_description')->name('doctor_description');
    Route::post('/doctor-description-update/{id}', 'doctor_description_update')->name('doctor_description_update');
});

//Blog Description Routs
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog-description', 'blog_description')->name('blog_description');
    Route::post('/blog-description-update/{id}', 'blog_description_update')->name('blog_description_update');
});
