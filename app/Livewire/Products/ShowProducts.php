<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\User;

class ShowProducts extends Component
{
    protected $listeners = ['deleteProduct', 'addToCart'];

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

    public function addToCart(Product $product) 
    {
        if(auth()->check()) {
            $this->addToUserCart($product);
        } else {
            $this->addToGuestCart($product);
        }
    }

    protected function addToUserCart(Product $product)
    {
        // $user = auth()->user();
        // $cart = $user->cart ?? $user->cart()->create();
    
        // if ($cart->items()->where('product_id', $product->id)->exists()) {
        //     $cart->items()->where('product_id', $product->id)->increment('quantity');
        // } else {
        //     $cart->items()->create([
        //         'product_id' => $product->id,
        //         'quantity' => 1,
        //     ]);
        // }
    }
}
