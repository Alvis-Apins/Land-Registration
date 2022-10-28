<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LandUnit>
 */
class LandUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usages = [null, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        return [
            'land_usage_id' => $usages[rand(0,12)],
            'cadastral_nr' => "1" . fake()->randomNumber(7) . fake()->randomNumber(6),
            'area' => fake()->randomFloat(2,0,20),
            'border_measurement_date' => fake()->date()
        ];
    }
}
