<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data_ppdbController;
use App\Models\User;

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

Route::get('/autocomplete', [RegisterController::class, 'cari_sekolah']);

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profil', [DashboardController::class, 'profil'])->name('detail');
Route::get('/data_ppdb', [Data_ppdbController::class, 'index'])->name('data_ppdb');
Route::put('/edit/profil/{id}', [Data_ppdbController::class, 'update']);
Route::get('/hapus_data_ppdb/{id}', [Data_ppdbController::class, 'destroy']);
Route::get('/print/formulir_ppdb', [Data_ppdbController::class, 'print']);
Route::get('/cetak}', [Data_ppdbController::class, 'cetak']);
