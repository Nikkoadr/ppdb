<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            seed_user::class,
            seed_jenis_kelamin::class,
            seed_asal_sekolah::class,
            seed_status_orang_tua::class,
            seed_periode::class,
            seed_status_siswa::class,
            seed_konsentrasi_keahlian::class
        ]);
    }
}
