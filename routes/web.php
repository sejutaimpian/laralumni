<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\AkunModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('cekdata', [HomeController::class, 'cekdata']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'validasi']);
});
Route::get('siswaterbaik', [HomeController::class, 'siswaterbaik']);
Route::get('kabaralumni', [HomeController::class, 'kabaralumni']);
Route::get('kabaralumni/{id}', [HomeController::class, 'kabar']);
Route::get('loker', [HomeController::class, 'loker']);
Route::get('kenangan', [HomeController::class, 'kenangan']);
Route::get('logout', [LoginController::class, 'logout']);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', [AdminController::class, 'index']);
});

Route::get('/test', function () {
    dd(auth()->user());
});
