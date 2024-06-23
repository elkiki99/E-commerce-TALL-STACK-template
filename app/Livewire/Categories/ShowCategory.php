<?php

namespace App\Livewire\Categories;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowCategory extends Component
{
    use WithPagination;

    public $category;
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

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)
            ->when($this->searchProduct !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->searchProduct . '%'))
            ->paginate(24);

        return view('livewire.categories.show-category', [
            'products' => $products
        ]);
    }
}
