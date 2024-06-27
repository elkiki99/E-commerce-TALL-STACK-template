<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ShowProduct extends Component
{
    protected $listeners = ['deleteProduct', 'addToCart'];
    
    public $product;
    public $category;
    public $tags;
    public $relatedProducts;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->category = Category::find($this->product->category_id);
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
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
                                        ->where('id', '!=', $this->product->id)
                                        ->get();

        return view('livewire.products.show-product', [
            'relatedProducts' => $this->relatedProducts
        ]);
    }
}
