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
            $table->string('nisn');
            $table->string('no_kk')->nullable();
            $table->string('no_nik')->nullable();
            $table->string('nama');
            $table->enum('sex', ['Laki - Laki', 'Perempuan'])->default('Laki - Laki');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu')->nullable();
            $table->enum('status_orang_tua', ['Masih Ada', 'Yatim', 'Piatu', 'Yatim Piatu'])->default('Masih Ada');
            $table->string('blok');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('no_siswa');
            $table->string('no_wali');
            $table->string('keahlian');
            $table->string('referensi')->nullable();
            $table->string('pasfoto')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta')->nullable();
            $table->string('ijazah')->nullable();
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
