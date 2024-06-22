<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTag extends Component
{
    use WithPagination;
    public $tag;
    protected $listeners = ['deleteProduct', 'addToCart'];

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('products.index');
    }

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        $products = $this->tag->products()->paginate(24);

        return view('livewire.tags.show-tag', [
            'products' => $products
        ]);
    }
}
