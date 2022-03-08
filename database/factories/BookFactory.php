<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->name;
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'author' => $this->faker->name,
            'description' => $this->faker->sentences(3, true),
            'isRead' => $this->faker->dateTime
        ];
    }
}
