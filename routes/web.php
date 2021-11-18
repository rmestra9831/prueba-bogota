<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Events\Login;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['ValidateSession']);

Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware(['verifiedEmail','generateCookie']);

Route::get('/verificacion', function () {
    return view('auth.verify');
})->name('verification.resend');

Route::get('/sesiones', function () {
    return view('auth.sessions');
});