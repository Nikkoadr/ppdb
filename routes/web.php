<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data_pendaftaranController;
use App\Http\Controllers\Cari_pendaftaranController;
use App\Http\Controllers\Data_priodeController;

use App\Http\Controllers\PendaftaranController;

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
    return redirect('https://forms.gle/zNAHWegGZoTeCc359');
});

Auth::routes([
    'register' => false]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/form_pendaftaran', [PendaftaranController::class, 'form_pendaftaran']);
Route::get('/get_asal_sekolah', [PendaftaranController::class, 'getAsalSekolah']);
Route::post('/proses_pendaftaran', [PendaftaranController::class, 'proses_pendaftaran']);
Route::get('/bukti_pendaftaran/{id}', [PendaftaranController::class, 'bukti_pendaftaran']);

Route::get('/cari_pendaftaran', [Cari_pendaftaranController::class, 'index']);
Route::post('/proses_cari_pendaftaran', [Cari_pendaftaranController::class, 'proses_cari_pendaftaran']);
Route::get('/scan/{code}', [Cari_pendaftaranController::class, 'scan']);
Route::get('/isi_ukuran_baju/{code}', [Cari_pendaftaranController::class, 'isi_ukuran_baju']);
Route::post('/proses_isi_ukuran_seragam_{id}', [Cari_pendaftaranController::class, 'proses_isi_ukuran_seragam']);

Route::get('/data_pendaftaran', [Data_pendaftaranController::class, 'index']);
Route::get('/data_pendaftaran/tambah', [Data_pendaftaranController::class, 'form_tambah_pendaftaran']);
Route::post('/data_pendaftaran/proses', [Data_pendaftaranController::class, 'proses_pendaftaran_admin']);
Route::get('/data_pendaftaran/edit/{id}', [Data_pendaftaranController::class, 'form_edit_pendaftaran_admin']);
Route::put('/data_pendaftaran/update/{id}', [Data_pendaftaranController::class, 'update_pendaftaran_admin']);
Route::get('/data_pendaftaran/cetak/{id}', [Data_pendaftaranController::class, 'cetak_pendaftaran']);
Route::get('/data_pendaftaran/hapus/{id}', [Data_pendaftaranController::class, 'hapus']);

Route::get('/data_priode', [Data_priodeController::class, 'index']);
Route::get('/data_priode/tambah', [Data_priodeController::class, 'form_tabah_priode']);
Route::get('/data_priode/proses', [Data_priodeController::class, 'proses_priode']);
Route::get('/data_priode/edit/{id}', [Data_priodeController::class, 'form_edit_priode']);
Route::get('/data_priode/update/{id}', [Data_priodeController::class, 'update_priode']);
Route::get('/data_priode/hapus/{id}', [Data_priodeController::class, 'hapus']);
