<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->name;
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'isResearched' => 0
        ];
    }
}
