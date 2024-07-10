<?php

use App\Http\Controllers\GoogleSearchController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/register', [UserController::class, 'RegisterPage'])->name('RegisterPage');
Route::post('/register-user', [UserController::class, 'RegisterUser'])->name('RegisterUser');
Route::get('/', [UserController::class, 'LoginPage'])->name('login');
Route::post('/login-check', [UserController::class, 'LoginCheck'])->name('loginCheck');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['web', 'checkUser']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/search', function () {
        return view('dashboard.result');
    })->name('search.form');

    Route::post('/search', [SearchController::class, 'search'])->name('search.results');
    Route::get('/google-search', function () {
        return view('dashboard.google_search');
    })->name('google.search');
    Route::get('/google-search-result', [GoogleSearchController::class, 'search'])->name('search');

});
