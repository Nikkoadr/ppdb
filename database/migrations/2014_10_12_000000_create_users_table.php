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
            $table->enum('role_id', ['1', '99'])->default('99');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nisn');
            $table->string('nama');
            $table->string('sex');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->string('no_siswa');
            $table->string('no_wali');
            $table->string('alamat');
            $table->string('keahlian');
            $table->string('referensi');
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
