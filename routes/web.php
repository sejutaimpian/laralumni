<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('siswaterbaik', [HomeController::class, 'siswaterbaik']);
Route::get('kabaralumni', [HomeController::class, 'kabaralumni']);
Route::get('kabaralumni/{id}', [HomeController::class, 'kabar']);
Route::get('loker', [HomeController::class, 'loker']);
Route::get('kenangan', [HomeController::class, 'kenangan']);

Route::get('/test', function () {
    dd(Session::all());
});
