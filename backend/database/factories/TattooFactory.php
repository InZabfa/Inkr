<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tattoo>
 */
class TattooFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'category' => $this->faker->word,
            'style' => $this->faker->word,
            'size' => $this->faker->word,
            'color' => $this->faker->word,
            'artist' => $this->faker->name,
        ];
    }
}
