<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cadastral_nr' => "1" . fake()->randomNumber(5) . fake()->randomNumber(5),
            'address' => fake()->address(),
            'ownership_status' => rand(1, 5)
        ];
    }
}
