<?php

namespace App\Livewire\Products;

use Livewire\Component;

class CreateProduct extends Component
{
    public $name;
    public $price;
    public $description;
    public $image;
    public $stock;
    public $category;
    public $tags;

    public function render()
    {
        return view('livewire.products.create-product');
    }
}
