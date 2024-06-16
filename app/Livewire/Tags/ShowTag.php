<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;

class ShowTag extends Component
{
    public $tag;
    public $products;

    protected $listeners = ['deleteProduct', 'addToCart'];

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('products.index');
    }
            
    public function addToCart(Product $product) 
    {
        dd($product->id);
    }

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
        $this->products = $tag->products()->get();
    }

    public function render()
    {
        if($this->products->count() > 24) {
            $this->products = $this->tag->products()->paginate(24);
        }
        return view('livewire.tags.show-tag', [
            'products' => $this->products
        ]);
    }
}
