<?php

use App\Http\Controllers\Dashboard\AlumniController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PenghargaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

// Route Home / Beranda
Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('cekdata', [HomeController::class, 'cekdata']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'validasi']);
});

Route::controller(HomeController::class)->group(function () {
    Route::get('siswaterbaik', 'siswaterbaik');
    Route::get('kabaralumni', 'kabaralumni');
    Route::get('kabaralumni/{id}', 'kabar');
    Route::get('loker', 'loker');
    Route::get('kenangan', 'kenangan');
});
Route::get('logout', [LoginController::class, 'logout']);

// Route Dashboard
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('', [DashboardController::class, 'index']);

    // Route Alumni
    Route::prefix('alumni')->controller(AlumniController::class)->group(function () {
        Route::get('', 'index');
        Route::get('{nis}', 'detail');

        Route::middleware('admin')->group(function () {
            Route::post('', 'tambahalumni');
            Route::get('{nis}/edit', 'edit');
            Route::put('{nis}', 'update');
            Route::delete('{nis}', 'delete');
        });
    });
    // Route Penghargaan
    Route::prefix('siswaterbaik')->controller(PenghargaanController::class)->group(function () {
        Route::get('', 'index');

        Route::middleware('admin')->group(function () {
            Route::post('{id}', 'tambah');
            Route::get('{id}/edit', 'edit');
            Route::put('{id}', 'update');
            Route::delete('{id}', 'delete');
        });
    });
});

// Route Tets
Route::get('/test', function () {
    dd(auth()->check());
});
