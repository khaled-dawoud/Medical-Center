<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClinicController as AdminClinicController;
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
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [AdminController::class, 'edit_profile'])->name('edit_profile');
    Route::post('/stor-profile/{id}', [AdminController::class, 'store_profile'])->name('store_profile');
    Route::post('/update-password', [AdminController::class, 'update_password'])->name('update_password');
    Route::resource('speciality', AdminClinicController::class);
});

// Site Routs
Route::get('/', [SiteController::class, 'index'])->name('site.index');
