<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data_pendaftarController;

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
    //return redirect('https://forms.gle/zNAHWegGZoTeCc359');
});

Auth::routes([
    'register' => false,]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/form_pendaftaran', [PendaftaranController::class, 'form_pendaftaran']);
Route::post('/proses_pendaftaran', [PendaftaranController::class, 'proses_pendaftaran']);
Route::post('/bukti_pendaftaran', [PendaftaranController::class, 'bukti_pendaftaran']);

Route::get('/data_pendaftar', [Data_pendaftarController::class, 'index']);
