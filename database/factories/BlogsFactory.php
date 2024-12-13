<?php

namespace Database\Factories;

use App\Models\Blogs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(70),
            'description' => $this->faker->text(255),
            'text' => $this->faker->text(500),
            'author_user_id' => 1,
        ];
    }
}
