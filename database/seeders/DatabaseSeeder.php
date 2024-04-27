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
        // Crear las categorías si no existen
        $categories = Category::factory()->count(10)->create();
    
        // Crear tags
        $tags = Tag::factory()->count(20)->create();
    
        // Crear productos, asociados a una categoría aleatoria y algunas etiquetas
        Product::factory()->count(30)->create()->each(function ($product) use ($categories, $tags) {
            // Asignar una categoría aleatoria al producto
            $category = $categories->random();
            $product->category()->associate($category)->save(); // Utilizamos associate() en lugar de category()
    
            // Asociar algunas etiquetas aleatorias al producto
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