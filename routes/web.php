<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CandidateController;
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



Route::get('login', [App\Http\Controllers\MainController::class, 'index'])->name('login');
Route::post('post-login', [App\Http\Controllers\MainController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [App\Http\Controllers\MainController::class, 'registration'])->name('register');
Route::post('post-registration', [App\Http\Controllers\MainController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [App\Http\Controllers\MainController::class, 'dashboard'])->name('dashboard'); 
Route::get('c_reg', [App\Http\Controllers\CandidateController::class, 'store'])->name('c_reg');
Route::get('c_view', [App\Http\Controllers\CandidateController::class, 'view'])->name('c_view');
Route::post('candidate-register', [App\Http\Controllers\CandidateController::class, 'storeData'])->name('candidate.register'); 

Route::get('logout', [App\Http\Controllers\MainController::class, 'logout'])->name('logout');

Route::resource('candidate', App\Http\Controllers\CandidateController::class);