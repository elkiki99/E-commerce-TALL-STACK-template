<?php

namespace App\Livewire\Products;

use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    public $product_id;
    public $name;
    public $price;
    public $description;
    public $image;
    public $stock;
    public $category;
    public $tagId;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:98',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:8192',
        'stock' => 'required|numeric|min:0',
        'category' => 'required|exists:categories,id',
        'tagId' => 'required|array|exists:tags,id'
    ];

    public function mount(Product $product)
    {
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->image = $product->image;
        $this->stock = $product->stock;
        $this->category = $product->category_id;
        $this->tagId = $product->tags()->pluck('tags.id')->toArray();
    }

    public function editProduct()
    {
        $data = $this->validate();  

        if($this->new_image) {
            $image = $this->new_image->store('public/img/products');
            $data['image'] = str_replace('public/img/products/', '', $image);
        }
        
        $product = Product::find($this->product_id);

        $product->name = $data['name'];
        $product->price = $data['price']; 
        $product->description = $data['description']; 
        $product->image = $data['image'] ?? $product->image; 
        $product->stock = $data['stock']; 
        $product->category_id = $data['category']; 

        $product->save();
        $product->tags()->sync(array_unique($data['tagId']));
        session()->flash('message', 'Product updated successfully');
        return redirect()->route('dashboard');
    }

    #[Computed()]
    public function tags()
    {
        return Tag::all();
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.products.edit-product', [
            'categories' => $categories
        ]);
    }
}
