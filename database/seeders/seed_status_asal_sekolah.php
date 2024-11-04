<?php

namespace Database\Seeders;

use App\Models\Status_asal_sekolah;
use Illuminate\Database\Seeder;

class seed_status_asal_sekolah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status_asal_sekolah::create([
            'nama_status_asal_sekolah' => 'Negeri',
        ]);

        Status_asal_sekolah::create([
            'nama_status_asal_sekolah' => 'Swasta',
        ]);
    }
}
