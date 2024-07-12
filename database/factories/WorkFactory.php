<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->text(200),
            'category_id' => $this->faker->numberBetween(1, 8),
            'url' => $this->faker->imageUrl(640, 480, 'human', true),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}