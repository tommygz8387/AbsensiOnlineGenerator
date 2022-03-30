<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DataAsistenController;
use App\Http\Controllers\Backend\DataMateriController;
use App\Http\Controllers\Backend\DataKelasController;
use App\Http\Controllers\Backend\KodeGeneratorController;
use App\Http\Controllers\Backend\AbsensiController;

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
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,

]);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout1');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// controller asisten
Route::controller(DataAsistenController::class)->group(function(){
    Route::get('/dataass/index', 'index')->name('indexDataAss');
    Route::get('/dataass/create', 'create')->name('createDataAss');
    Route::get('/dataass/edit/{id}', 'edit')->name('editDataAss');
    Route::post('/dataass/post', 'store')->name('storeDataAss');
    Route::post('/dataass/update/{id}', 'update')->name('updateDataAss');
    Route::get('/dataass/delete/{id}', 'destroy')->name('destroyDataAss');
});


// controller kelas
Route::controller(DataKelasController::class)->group(function(){
    Route::get('/datakel/index', 'index')->name('indexDataKel');
    Route::get('/datakel/create', 'create')->name('createDataKel');
    Route::get('/datakel/edit/{id}', 'edit')->name('editDataKel');
    Route::post('/datakel/post', 'store')->name('storeDataKel');
    Route::post('/datakel/update/{id}', 'update')->name('updateDataKel');
    Route::get('/datakel/delete/{id}', 'destroy')->name('destroyDataKel');
});


// controller materi
Route::controller(DataMateriController::class)->group(function(){
    Route::get('/datamat/index', 'index')->name('indexDataMat');
    Route::get('/datamat/create', 'create')->name('createDataMat');
    Route::get('/datamat/edit/{id}', 'edit')->name('editDataMat');
    Route::post('/datamat/post', 'store')->name('storeDataMat');
    Route::post('/datamat/update/{id}', 'update')->name('updateDataMat');
    Route::get('/datamat/delete/{id}', 'destroy')->name('destroyDataMat');
});


// kode generator
Route::controller(KodeGeneratorController::class)->group(function(){
    Route::get('/kode/index', 'index')->name('indexKode');
    Route::get('/kode/generate/module/{frommodule}', 'store')->name('generateKode');
    Route::get('/kode/generate/dash/{fromdashboard}', 'store')->name('generateKodeDash');
});

// Absensi
Route::controller(AbsensiController::class)->group(function () {
    Route::post('/absen/masuk', 'store')->name('storeAbsen');
    Route::get('/absen/keluar', 'updateAbsen')->name('updateAbsen');
});