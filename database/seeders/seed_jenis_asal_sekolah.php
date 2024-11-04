<?php

namespace Database\Seeders;

use App\Models\Jenis_asal_sekolah;
use Illuminate\Database\Seeder;

class seed_jenis_asal_sekolah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis_asal_sekolah::create([
            'nama_jenis_asal_sekolah' => 'SMP',
        ]);
        Jenis_asal_sekolah::create([
            'nama_jenis_asal_sekolah' => 'MTS',
        ]);
        Jenis_asal_sekolah::create([
            'nama_jenis_asal_sekolah' => 'Terbuka',
        ]);
        Jenis_asal_sekolah::create([
            'nama_jenis_asal_sekolah' => 'SKBM',
        ]);
        Jenis_asal_sekolah::create([
            'nama_jenis_asal_sekolah' => 'Pesantren',
        ]);
    }
}
