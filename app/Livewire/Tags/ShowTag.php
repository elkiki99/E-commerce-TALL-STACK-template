<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowTag extends Component
{
    use WithPagination;

    public $tag;
    public string $searchProduct = '';
    protected $listeners = ['deleteProduct', 'addToCart'];

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('products.index');
    }
    
    public function updating($key)
    {
        if ($key === 'searchProduct') {
            $this->resetPage();
        }
    }

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        $products = $this->tag->products()
            ->when($this->searchProduct !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->searchProduct . '%'))
            ->paginate(24);

        return view('livewire.tags.show-tag', [
            'products' => $products
        ]);
    }
}
