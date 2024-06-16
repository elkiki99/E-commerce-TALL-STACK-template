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
        $categories = Category::factory()->count(10)->create();
        $tags = Tag::factory()->count(10)->create();
    
        Product::factory()->count(10)->create()->each(function ($product) use ($categories, $tags) {
            $category = $categories->random();
            $product->category()->associate($category)->save(); 
    
            $product->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        });
    }

    public function down(): void
    {
        Product::truncate();
        Category::truncate();
        Tag::truncate();
    }
}