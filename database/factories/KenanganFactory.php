<?php

namespace Database\Factories;

use App\Models\KenanganModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KenanganFactory extends Factory
{
    protected $model = KenanganModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kenangan' => fake()->sentence(),
            'pengelola' => fake()->firstName(),
            'link' => fake()->url()
        ];
    }
}
