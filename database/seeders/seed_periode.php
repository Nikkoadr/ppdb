<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Seeder;

class seed_periode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periode::create([
            'tahun_ajaran' => '2025/2026',
            'periode_aktif' => 'Early Bird',
        ]);
    }
}
