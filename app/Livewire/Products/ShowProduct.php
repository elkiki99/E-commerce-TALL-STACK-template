<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ShowProduct extends Component
{
    protected $listeners = ['deleteProduct'];
    
    public $product;
    public $tags;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->tags = $product->tags()->get();
    }
    
    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $categories = Category::all();
        
        return view('livewire.products.show-product', [
            'categories' => $categories,
            'tags' => $this->tags
        ]);
    }
}
