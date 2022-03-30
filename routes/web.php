<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;

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

Route::group (['middleware' => 'guest:login'], function(){
    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post('masuk',[LoginController::class,'aksilogin'])->name('masuk');
    Route::get('register',[LoginController::class,'register'])->name('register');
    Route::post('daftar',[LoginController::class,'daftar'])->name('daftar');
    
});

Route::group (['middleware' => ['web','auth:login']],function(){
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('user',[UserController::class,'index'])->name('user');
    Route::get('input-user',[UserController::class,'tambahUser'])->name('input-user');
    Route::post('save-user',[UserController::class,'save'])->name('save-user');
    Route::get('edit-user/{id}',[UserController::class,'editUser'])->name('edit-user');
    Route::post('update-user/{id}',[UserController::class,'updateUser'])->name('update-user');
    Route::get('delete-user/{id}',[UserController::class,'deleteUser'])->name('delete-user');
    
    Route::get('barang',[BarangController::class,'index'])->name('barang');
    Route::get('input-barang',[BarangController::class,'inputBarang'])->name('input-barang');
    Route::post('save-barang',[BarangController::class,'saveBarang'])->name('save-barang');

    Route::post('logout',[LoginController::class,'keluar'])->name('logout');
});

// Login

