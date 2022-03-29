<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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



Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('user',[UserController::class,'index'])->name('user');
Route::get('input-user',[UserController::class,'tambahUser'])->name('input-user');
Route::post('save-user',[UserController::class,'save'])->name('save-user');
Route::get('edit-user/{id}',[UserController::class,'editUser'])->name('edit-user');
Route::post('update-user/{id}',[UserController::class,'updateUser'])->name('update-user');
Route::delete('delete-user/{id}',[UserController::class,'deleteUser'])->name('delete-user');
