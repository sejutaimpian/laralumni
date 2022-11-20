<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akun')->insert([
            [
                'nis' => 'x',
                'nama' => 'Admin',
                'nowhatsapp' => '08',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$VwNxmzW0bu6AOA2UVSaGYOV7P1wJok3oJ.MVCEBVFOhJlW3tY08PO',
                'foto' => 'profil.png',
                'role' => 'admin',
                'is_active' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => 'y',
                'nama' => 'Bukan Admin',
                'nowhatsapp' => '08',
                'email' => 'badmin@gmail.com',
                'password' => '$2y$10$VwNxmzW0bu6AOA2UVSaGYOV7P1wJok3oJ.MVCEBVFOhJlW3tY08PO',
                'foto' => 'profil.png',
                'role' => 'user',
                'is_active' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
