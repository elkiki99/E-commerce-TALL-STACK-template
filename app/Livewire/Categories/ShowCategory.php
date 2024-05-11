<?php

namespace App\Livewire\Categories;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ShowCategory extends Component
{
    public $category;
    public $products;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->products = Product::where('category_id', $category->id)->get();
    }

    public function render()
    {
        if($this->products->count() > 24) {
            $this->products = Product::where('category_id', $this->category->id)->paginate(24);
        }
        return view('livewire.categories.show-category', [
            'products' => $this->products
        ]);
    }
}