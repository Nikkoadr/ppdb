<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seed_soal extends Seeder
{
    public function run(): void
    {

        // Soal 1
        $q1 = DB::table('soal')->insertGetId([
            'soal' => 'Apa ibu kota negara Prancis?',
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            ['id_soal' => $q1, 'text' => 'Berlin', 'image' => null, 'skor' => 0],
            ['id_soal' => $q1, 'text' => 'Madrid', 'image' => null, 'skor' => 0],
            ['id_soal' => $q1, 'text' => 'Paris', 'image' => null, 'skor' => 100],
            ['id_soal' => $q1, 'text' => 'Roma', 'image' => null, 'skor' => 0],
        ]);

        // Soal 2
        $q2 = DB::table('soal')->insertGetId([
            'soal' => 'Identifikasi gambar bangunan berikut:',
            'gambar' => 'images/eiffel.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            ['id_soal' => $q2, 'text' => 'Menara Eiffel', 'image' => null, 'skor' => 100],
            ['id_soal' => $q2, 'text' => 'Patung Liberty', 'image' => null, 'skor' => 0],
            ['id_soal' => $q2, 'text' => 'Big Ben', 'image' => null, 'skor' => 0],
            ['id_soal' => $q2, 'text' => 'Burj Khalifa', 'image' => null, 'skor' => 0],
        ]);

        // Soal 3
        $q3 = DB::table('soal')->insertGetId([
            'soal' => 'Manakah gambar harimau?',
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            ['id_soal' => $q3, 'text' => null, 'image' => 'images/lion.jpg', 'skor' => 0],
            ['id_soal' => $q3, 'text' => null, 'image' => 'images/tiger.jpg', 'skor' => 100],
            ['id_soal' => $q3, 'text' => null, 'image' => 'images/cheetah.jpg', 'skor' => 0],
            ['id_soal' => $q3, 'text' => null, 'image' => 'images/leopard.jpg', 'skor' => 0],
        ]);
    }
}
