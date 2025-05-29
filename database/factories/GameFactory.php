<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true),
            'genre' => $this->faker->word(),
            'image_url' => $this->faker->imageUrl(640, 480, 'games', true),
        ];
    }
}