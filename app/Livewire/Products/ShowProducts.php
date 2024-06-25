<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowProducts extends Component
{
    use WithPagination;

    public string $searchProduct = '';
    protected $listeners = ['deleteProduct'];

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

    public function render()
    {
        $products = Product::with('category')
            ->when($this->searchProduct !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->searchProduct . '%'))
            ->paginate(24);

        return view('livewire.products.show-products', [
            'products' => $products
        ]);
    }
}
