<?php

namespace Database\Seeders;

use App\Models\Status_orang_tua;
use Illuminate\Database\Seeder;

class seed_status_orang_tua extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status_orang_tua::create([
            'nama_status_orang_tua' => 'Masih Ada',
        ]);
        Status_orang_tua::create([
            'nama_status_orang_tua' => 'Yatim',
        ]);
        Status_orang_tua::create([
            'nama_status_orang_tua' => 'Piatu',
        ]);
        Status_orang_tua::create([
            'nama_status_orang_tua' => 'Yatim Piatu',
        ]);
    }
}
