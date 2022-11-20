<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            [
                'nama_jurusan' => 'Teknik Komputer & Jaringan',
                'icon' => 'bi-mouse2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jurusan' => 'Teknik Sepeda Motor',
                'icon' => 'bi-tools',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
