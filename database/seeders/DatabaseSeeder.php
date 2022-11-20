<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AlumniModel;
use App\Models\KabarModel;
use App\Models\KenanganModel;
use App\Models\PenghargaanModel;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        AlumniModel::factory(10)->create();
        KabarModel::factory(10)->create();
        KenanganModel::factory(10)->create();
        PenghargaanModel::factory(10)->create();
        $this->call([
            ProfileSeeder::class,
            AkunSeeder::class,
            LokerSeeder::class,
            JurusanSeeder::class
        ]);
    }
}
