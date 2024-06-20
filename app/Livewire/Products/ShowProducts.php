<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class ShowProducts extends Component
{
    use WithPagination;

    public $search = '';
    public string $searchProduct = '';
    public int $searchCategory = 0;
    public Collection $categories;

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
        if ($key === 'searchProduct' || $key === 'searchCategory') {
            $this->resetPage();
        }
    }

    public function mount()
    {
        $this->categories = Category::pluck('category', 'id');
    }

    public function render()
    {
        $products = Product::with('category')
            ->when($this->searchProduct !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->searchProduct . '%')) 
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory)) 
            ->paginate(24);

        return view('livewire.products.show-products', [
            'products' => $products
        ]);
    }
}
