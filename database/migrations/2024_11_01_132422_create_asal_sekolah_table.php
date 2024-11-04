<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsalSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asal_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('npsn')->nullable();
            $table->string('nama_asal_sekolah');
            $table->foreignId('id_jenis_asal_sekolah')->nullable()->index()->references('id')->on('jenis_asal_sekolah');
            $table->foreignId('id_status_asal_sekolah')->nullable()->index()->references('id')->on('status_asal_sekolah');
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
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
        Schema::dropIfExists('asal_sekolah');
    }
}
