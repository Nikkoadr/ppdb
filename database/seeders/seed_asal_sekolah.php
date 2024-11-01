<?php

namespace Database\Seeders;

use App\Models\Asal_sekolah;
use Illuminate\Database\Seeder;

class seed_asal_sekolah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asal_sekolah::create([

            'nama_asal_sekolah' => 'SMP Muhammadiyah Kandanghaur',
        ]);
    }
}
