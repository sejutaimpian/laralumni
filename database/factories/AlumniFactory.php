<?php

namespace Database\Factories;

use App\Models\AlumniModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlumniFactory extends Factory
{
    protected $model = AlumniModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nisn' => fake()->randomNumber(4),
            'nama' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'ortu_wali' => fake()->name(),
            'id_jurusan' => Arr::random([1, 2]),
            'tahun_masuk' => fake()->year(),
            'status' =>  Arr::random(["LULUS", "BELUM LULUS", "DIKELUARKAN", "PINDAH"]),
            'tahun_keluar' => fake()->year(),
            'foto' => Arr::random(['Avatar (1).png', 'Avatar (2).png', 'Avatar (3).png', 'Avatar (4).png', 'Avatar (5).png', 'Avatar (6).png', 'Avatar (7).png']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
