<?php

namespace App\Livewire\Products;

use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $description;
    public $image;
    public $stock;
    public $category;
    public $tags;

    protected $rules = [
        'name' => 'required|string|max:98',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'stock' => 'required|numeric|min:0',
        'category' => 'required|exists:categories,id',
        'tags' => 'required|array',
        'tags.*' => 'exists:tags,id'
    ];

    public function createProduct()
    {
        $data = $this->validate();

        //Image
        $image = $this->image->store('public/img/products');
        $data['image'] = str_replace('public/img/products/', '', $image);

        //Store product
        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $data['image'],
            'stock' => $data['stock'],
            'category_id' => $data['category'],
        ]); 
        
        $product->tags()->sync($data['tags']);
        session()->flash('message', 'Product created successfully');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $categories = Category::all();
        $this->tags = Tag::all();

        return view('livewire.products.create-product', [
            'categories' => $categories,
            'tags' => $this->tags
        ]);
    }
}
