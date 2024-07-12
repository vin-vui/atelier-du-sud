<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $created_at = $this->faker->dateTimeBetween('-1 year');
        
        return [
            'body' => $this->faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        ];
    }
}