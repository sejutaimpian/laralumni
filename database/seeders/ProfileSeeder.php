<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            'nama_aplikasi' => 'Portal Alumni SMK YPI Khoerul Falah Jompong',
            'jargon' => 'Alumni adalah bukti pendidikan',
            'nama_organisasi' => 'SMK YPI Khoerul Falah Jompong',
            'logo' => 'logosmkjompong.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
