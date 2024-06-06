<?php

namespace App\Livewire\Categories;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ShowCategory extends Component
{
    public $category;
    public $products;

    protected $listeners = ['deleteProduct', 'addToCart'];

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('dashboard');
    }
        
    // public function addToCart(Product $product) 
    // {
    //     dd($product->id);
    // }

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