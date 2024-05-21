<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ShowProducts extends Component
{
    protected $listeners = [
        'deleteProduct'];

    public $product;

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('home');
    }

    public function render()
    {
        $products = Product::latest()->paginate(24);
        return view('livewire.products.show-products', [
            'products' => $products
        ]);
    }
}
