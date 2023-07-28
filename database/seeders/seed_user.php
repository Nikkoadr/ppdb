<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class seed_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'verifikasi' => 'Verified',
            'daftar_ulang' => 'Sudah Daftar Ulang',
            'status_mpls' => 'Sudah Siap',
            'email' => 'admin@smkmuhkandanghaur.sch.id',
            'password' => Hash::make('P4ssw0rd'),
            'nisn' => '3214566987',
            'no_kk' => '43215432',
            'no_nik' => '56452423',
            'nisn' => '3214566987',
            'nama' => 'Administrator',
            'sex' => 'Laki - Laki',
            'tempat_lahir' => 'Indramayu',
            'tanggal_lahir' => Carbon::create(2000, 02, 25),
            'asal_sekolah' => 'SMK Muhammadiyah Kandanghaur',
            'no_siswa' => '08129005000',
            'no_wali' => '08120003000',
            'nama_ayah' => 'elon gates',
            'pekerjaan_ayah' => 'macul',
            'nama_ibu' => 'lucinta luna',
            'pekerjaan_ibu' => 'gebod',
            'status_orang_tua' => 'Masih Ada',
            'blok' => 'blokir',
            'rt' => '21',
            'rw' => '06',
            'desa' => 'Karanganyar',
            'kecamatan' => 'Kandanghaur',
            'kabupaten' => 'Indramayu',
            'keahlian' => 'TJKT',
            'referensi' => 'Maman',
        ]);
    }
}
