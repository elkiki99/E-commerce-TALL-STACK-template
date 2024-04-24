<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create categories
        $categories = Category::factory()->count(10)->create();

        // Create tags
        $tags = Tag::factory()->count(20)->create();

        // Create products, randomly attached to a category and some tags
        Product::factory()->count(50)->create()->each(function ($product) use ($categories, $tags) {
            $category = $categories->random();
            $product->category_id = $category->id;
            $product->save();

            $product->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        });
    }
}