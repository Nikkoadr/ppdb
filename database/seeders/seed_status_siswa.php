<?php

namespace Database\Seeders;

use App\Models\Status_siswa;
use Illuminate\Database\Seeder;

class seed_status_siswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status_siswa::create([
            'nama_status_siswa' => 'Tidak Tervalidasi',
        ]);
        Status_siswa::create([
            'nama_status_siswa' => 'Tervalidasi',
        ]);
        Status_siswa::create([
            'nama_status_siswa' => 'Sudah Daftar Ulang',
        ]);
    }
}
