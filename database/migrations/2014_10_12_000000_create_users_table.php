<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('verifikasi', ['Verified', 'Not Verified'])->default('Not Verified');
            $table->enum('daftar_ulang', ['Belum Daftar Ulang', 'Sudah Daftar Ulang'])->default('Belum Daftar Ulang');
            $table->enum('status_mpls', ['Sudah Siap', 'Belum Siap'])->default('Belum Siap');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nisn')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_nik')->nullable();
            $table->string('nama');
            $table->enum('sex', ['Laki - Laki', 'Perempuan'])->default('Laki - Laki');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('asal_sekolah');
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->enum('status_orang_tua', ['Masih Ada', 'Yatim', 'Piatu', 'Yatim Piatu'])->default('Masih Ada')->nullable();
            $table->string('blok')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('no_siswa')->nullable();
            $table->string('no_wali')->nullable();
            $table->string('pasfoto')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta')->nullable();
            $table->string('ijazah')->nullable();
            $table->integer('panjang_baju')->nullable();
            $table->integer('lingkar_dada')->nullable();
            $table->integer('lebar_punggung')->nullable();
            $table->integer('panjang_lengan_pendek')->nullable();
            $table->integer('panjang_lengan_panjang')->nullable();
            $table->integer('panjang_celana_rok')->nullable();
            $table->integer('lingkar_panggul')->nullable();
            $table->integer('ukuran_sepatu')->nullable();
            $table->string('keahlian');
            $table->string('referensi')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
