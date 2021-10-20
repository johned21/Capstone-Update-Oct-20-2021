<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about']);
Route::get('/dashboard', [SiteController::class, 'dashboard']);

Auth::routes();

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/users-detail-page', function () {
    return view('users-detail-page');
});

Route::get('/students-detail-page', function () {
    return view('students-detail-page');
});

// Route::get('/register', [AuthController::class, 'registrationForm']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>'auth'], function() {
    
    Route::group(['prefix'=>'admin', 'middleware'=>'isAdmin'], function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('users', [AdminController::class, 'showUsers'])->name('admin.users');
        Route::post('users', [AdminController::class, 'storeUser'])->name('admin.users');
        Route::patch('users', [AdminController::class, 'updateUser'])->name('admin.users');
        Route::delete('users', [AdminController::class, 'deleteUser'])->name('admin.users');

        Route::get('students', [AdminController::class, 'showStudents'])->name('admin.students');
    });
    
    Route::group(['prefix'=>'user', 'middleware'=>'isUser'], function () {
        Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('personalinfoform', [UserController::class, 'personalInfoForm'])->name('user.personalinfo');
        Route::post('personalinfoform', [UserController::class, 'personalInfoStore'])->name('user.personalinfo');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

