<?php

namespace Database\Seeders;

use App\Models\Jenis_kelamin;
use Illuminate\Database\Seeder;


class seed_jenis_kelamin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis_kelamin::create([

            'nama_jenis_kelamin' => 'Laki - Laki',
        ]);
        Jenis_kelamin::create([

            'nama_jenis_kelamin' => 'Perempuan',
        ]);
    }
}
