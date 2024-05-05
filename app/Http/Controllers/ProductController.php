<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(24);

        return view('products.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        $tags = $product->tags()->get();

        return view('products.show', [
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('products.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:98',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'stock' => 'required|integer|min:0',
            'category' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $imagePath = $request->file('image')->store('public/img/products');
        $imageName = str_replace('public/img/products/', '', $imagePath);
    
        $product = Product::create([
            'name' => $validate['name'],
            'price' => $validate['price'],
            'description' => $validate['description'],
            'image_name' => $imageName,
            'stock' => $validate['stock'],
            'category_id' => $validate['category'],
        ]); 
        
        $product->tags()->sync(array_unique($validate['tags']));
        session()->flash('message', 'Product created successfully');
        return redirect()->route('dashboard');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
    
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:98',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'stock' => 'required|integer|min:0',
            'category' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ]);
    
        $updateData = [
            'name' => $validate['name'],
            'price' => $validate['price'],
            'description' => $validate['description'],
            'stock' => $validate['stock'],
            'category_id' => $validate['category'],
        ];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/img/products');
            $imageName = str_replace('public/img/products/', '', $imagePath);
            $updateData['image_name'] = $imageName;
    
            if ($product->image_name) {
                Storage::delete('public/img/products/' . $product->image_name);
            }
        }
    
        $product->update($updateData);
        $product->tags()->sync(array_unique($validate['tags']));
        session()->flash('message', 'Product updated successfully');
        return redirect()->route('dashboard');
    }

    public function destroy(Product $product)
    {   
        $product->delete();
        $product->tags()->detach();
        session()->flash('message', 'Product deleted successfully');
        return redirect()->route('dashboard');
    }
}
