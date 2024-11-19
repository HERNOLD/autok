<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'maker_id'=>1,
            'model_id'=>1,
            'fuel_id'=>1,
            'gear_id'=>1,
            'body_id'=>1,
            'color_id'=>1,
        ];
    }
}
