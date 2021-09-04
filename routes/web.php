<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\SubsController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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


// Login User
Auth::routes([
    'reset' => false,
]);

// Menu User
Route::get('/', [QuranController::class, 'index'])->name('home');
Route::get('/cari', [QuranController::class, 'search']);
Route::get('/home', [QuranController::class, 'index'])->name('home');
Route::get('/surah/{id}', [QuranController::class, 'surah']);
Route::resource('/surahfav', QuranController::class);
Route::resource('/blog-detail', QuranController::class);
Route::get('/surah-favorit', [QuranController::class, 'surahFavorit']);
Route::get('/disFav', [QuranController::class, 'disFav']);
Route::get('/blog-quran', [QuranController::class, 'blog']);
Route::get('/contact-us', [QuranController::class, 'aboutUs']);

// Login Admin
Route::get('/admin', [LoginController::class, 'showForm']);
Route::post('/admin-login', [LoginController::class, 'loginProses']);
Route::get('/admin-logout', [LoginController::class, 'logoutProses']);

// Menu Admin
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::resource('/jadwal', JadwalController::class);
        Route::resource('/blog', BlogController::class);
        Route::resource('/banner', BannerController::class);
        Route::resource('/kontak', KontakController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/dashboard', HomeController::class);
        Route::resource('/surah-fav', SurahController::class);
        Route::resource('/subscribers', SubsController::class);
    }
);
