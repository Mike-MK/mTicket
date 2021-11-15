<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;



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
Route::get('/', function(){
    return view('home');
});
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('role:admin');

Route::get('/register',[RegisterController::class , 'index'])->name('register_page');
Route::post('/register',[RegisterController::class , 'register'])->name('register');

Route::get('/login',[LoginController::class , 'index'])->name('login_page');
Route::post('/login',[LoginController::class , 'login'])->name('login');

Route::get('/logout',[LogoutController::class , 'logout'])->name('logout');

Route::get('/tickets', function () {
    return view('tickets.index');
});

Route::post('/event',[DashboardController::class,'store'])->name('add_event');
