<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Consultation;
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


Route::get('/dash', function () {
    return view('dashboard/themeTools/index');
});

// Theme
Route::get('/dash/form', function() {
    return view('dashboard/themeTools/forms');
});
Route::get('/dash/table', function() {
    return view('dashboard/themeTools/tables');
});
Route::get('/dash/button', function() {
    return view('dashboard/themeTools/buttons');
});
Route::get('/dash/icon', function() {
    return view('dashboard/themeTools/icons');
});

Route::resource('/admin/user', UserController::class);
Route::resource('/admin/category', CategoryController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
