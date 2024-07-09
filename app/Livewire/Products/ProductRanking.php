<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductRanking extends Component
{
    public $product;
    public $averageRating;

    public function mount($product)
    {
        $this->product = $product;
        $this->calculateAverageRating();
    }

    public function calculateAverageRating()
    {
        $this->product = Product::find($this->product);
        $this->averageRating = 
            // $product->ratings()->avg('rating')
            4
        ;
    }

    public function render()
    {
        return view('livewire.products.product-ranking');
    }
}
