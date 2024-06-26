<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 1200),
            'description' => $this->faker->sentence,
            'image_name' => $this->faker->imageUrl(),
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' => Category::factory()->create()->id,
        ];
    }
}
