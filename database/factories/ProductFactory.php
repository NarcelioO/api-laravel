<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    
            'name' => $this->faker->word(),
            'type' => $this->faker->word(),
            'rarity' => $this->faker->randomElement(['common', 'uncommon', 'rare', 'epic', 'legendary']),
            'description' => $this->faker->sentence(),
            'requeriment' => $this->faker->randomDigit(),
            'effect' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 1, 1000)
        ];
    }
}
