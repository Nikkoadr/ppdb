<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data_ppdbController;
use App\Http\Controllers\DetailController;

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

Route::get('/profile', [DetailController::class, 'profile'])->name('detail');
Route::put('/edit/profile/{id}', [DetailController::class, 'update_profile']);
Route::put('/ukuran_baju/{id}', [DetailController::class, 'update_baju']);
Route::put('/ukuran_celana/{id}', [DetailController::class, 'update_celana']);
Route::put('/ukuran_sepatu/{id}', [DetailController::class, 'update_sepatu']);
Route::post('/upload_pasfoto_siswa/{id}', [DetailController::class, 'upload_pasfoto_siswa']);
Route::post('/upload_kk_siswa/{id}', [DetailController::class, 'upload_kk_siswa']);
Route::post('/upload_akta_siswa/{id}', [DetailController::class, 'upload_akta_siswa']);
Route::post('/upload_ijazah_siswa/{id}', [DetailController::class, 'upload_ijazah_siswa']);
Route::get('/print/formulir_ppdb', [DetailController::class, 'print']);

Route::get('/data_ppdb', [Data_ppdbController::class, 'index'])->name('data_ppdb');
Route::get('/edit_data_siswa_id{id}', [Data_ppdbController::class, 'edit_data_siswa'])->name('edit_data_siswa');
Route::put('/update_data_siswa_id{id}', [Data_ppdbController::class, 'update_data_ppdb_admin']);
Route::put('/ubah_password_siswa/{id}', [Data_ppdbController::class, 'ubah_password_siswa']);
Route::get('/hapus_data_ppdb/{id}', [Data_ppdbController::class, 'destroy']);
Route::get('/print_formulir_ppdb_via_admin/{id}', [Data_ppdbController::class, 'print']);

Route::post('/multiple_delete', [Data_ppdbController::class, 'deleteChecked']);
