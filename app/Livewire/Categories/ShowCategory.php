<?php

namespace App\Livewire\Categories;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShowCategory extends Component
{
    use WithPagination;
    public $category;
    protected $listeners = ['deleteProduct', 'addToCart'];

    public function deleteProduct(Product $product)
    {
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('products.index');
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)->paginate(24);

        return view('livewire.categories.show-category', [
            'products' => $products
        ]);
    }
}
