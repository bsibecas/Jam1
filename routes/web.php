<?php

use App\Models\Ad;

use App\Http\Controllers\UserAdController;
use App\Http\Controllers\AdLikeController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewAdsController;
use App\Http\Controllers\Auth\LogInController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategorySearch;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\howto;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('/home');
})->name('home');

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/user/{user:username}/ads', [UserAdController::class, 'index'])->name('users.ads');

Route::get('/login', [LogInController::class, 'index'])->name('login');
Route::post('/login', [LogInController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/search', [AdsController::class, 'search'])->name('search');
Route::get('/catSearch', [CategorySearch::class, 'catSearch'])->name('catSearch');

Route::get('/ads', [AdsController::class, 'index'])->name('ads');
Route::post('/ads', [AdsController::class, 'store']);

Route::get('/viewads', [ViewAdsController::class, 'index'])->name('viewads');
Route::get('/viewads/{ad}', [ViewAdsController::class, 'show'])->name('viewads.show');
Route::delete('/viewads/{ad}', [ViewAdsController::class, 'destroy'])->name('ads.destroy');
Route::get('/editad/{id}', [ViewAdsController::class, 'edit']);
Route::put('/updatead/{id}', [ViewAdsController::class, 'update']);

Route::post('/ads/{ad}/likes', [AdLikeController::class, 'store'])->name('ads.likes');
Route::delete('/ads/{ad}/likes', [AdLikeController::class, 'destroy'])->name('ads.likes');
Route::get('/adsliked/{id}', [AdLikeController::class, 'showLikeAd'])->name('adsliked');

Route::get('/profile', [UserController::class, 'userEdit'])->name('editUser');
Route::post('/profile', [UserController::class, 'userUpdate']);

Route::get('/howto', [howto::class, 'index'])->name('howto');
