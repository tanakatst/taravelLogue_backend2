<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'prefecture' => $this->faker->Str::random(5),
            'date' => $this->faker->dateTime(),
            'place_name' => $this->faker->Str::random(14),
            'user_id' => 1,
            'content' => $this->faker->Str::random(40)
        ];
    }
}
