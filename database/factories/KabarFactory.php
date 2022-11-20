<?php

namespace Database\Factories;

use App\Models\KabarModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KabarFactory extends Factory
{
    protected $model = KabarModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idakun' => mt_rand(1, 2),
            'judul' => fake()->sentence(),
            'isi' => fake()->paragraph(),
            'foto' => Arr::random(['banner (1).png', 'banner (2).png', 'banner (3).png', 'banner (4).png', 'banner (5).png', 'banner (6).png', 'banner (7).png', 'banner (8).png']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
