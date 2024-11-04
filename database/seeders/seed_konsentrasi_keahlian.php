<?php

namespace Database\Seeders;

use App\Models\Konsentrasi_keahlian;
use Illuminate\Database\Seeder;

class seed_konsentrasi_keahlian extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Konsentrasi_keahlian::create([
            'nama_konsentrasi_keahlian' => 'Teknik Pengelasan (LAS)',
        ]);
        Konsentrasi_keahlian::create([
            'nama_konsentrasi_keahlian' => 'Teknik Elektronika Industri (TEI)',
        ]);
        Konsentrasi_keahlian::create([
            'nama_konsentrasi_keahlian' => 'Teknik Kendaraan Ringan (TKR)',
        ]);
        Konsentrasi_keahlian::create([
            'nama_konsentrasi_keahlian' => 'Teknik Komputer dan Jaringan (TKJ)',
        ]);
        Konsentrasi_keahlian::create([
            'nama_konsentrasi_keahlian' => 'Teknik Sepeda Motor (TSM)',
        ]);
        Konsentrasi_keahlian::create([
            'nama_konsentrasi_keahlian' => 'Farmasi Klinis dan Komunitas (FKK)',
        ]);
    }
}
