<?php

namespace Database\Factories;

use App\Models\PenghargaanModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PenghargaanFactory extends Factory
{
    protected $model = PenghargaanModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nis' => mt_rand(0, 9999),
            'penghargaan' => fake()->sentence(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
