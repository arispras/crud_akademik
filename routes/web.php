<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daftar-jurusan', 'App\Http\Controllers\JurusanController@index')->middleware('auth');
Route::resource('jurusans', 'App\Http\Controllers\JurusanController')->middleware('auth');
Route::get('/mahasiswas', 'App\Http\Controllers\MahasiswaController@index')->middleware('auth');
Route::resource('mahasiswas', 'App\Http\Controllers\MahasiswaController')->middleware('auth');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
