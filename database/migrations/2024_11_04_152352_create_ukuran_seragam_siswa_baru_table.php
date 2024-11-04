<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkuranSeragamSiswaBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukuran_seragam_siswa_baru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pendaftaran')->nullable()->index()->references('id')->on('pendaftaran');
            $table->enum('ukuran_baju', ['S', 'M', 'L', 'XL','XXL'])->nullable();
            $table->enum('ukuran_celana', ['27', '28', '29', '30','31','32','33','34','35','36','37','38'])->nullable();
            $table->enum('ukuran_sepatu', ['37', '38', '39', '40','41','42','43','44'])->nullable();
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
        Schema::dropIfExists('ukuran_seragam_siswa_baru');
    }
}
