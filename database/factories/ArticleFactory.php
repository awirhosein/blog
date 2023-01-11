<?php

namespace Database\Factories;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(1, 3)),
            'author_id' => rand(1, 10),
            'content' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'status' => ArticleStatus::PUBLISHED
        ];
    }
}
