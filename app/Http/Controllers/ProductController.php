<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(24);

        return view('products.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.show', [
            'product' => $product,
            'categories' => $categories
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
            'category' => 'required|exists:categories,id',
            'tags' => 'required|exists:tags,id',
            // 'tags.*' => 'exists:tags,id'
        ]);

        $imagePath = $request->file('image_name')->store('img/products', 'public');

        $product = Product::create([
            'name' => $validate['name'],
            'price' => $validate['price'],
            'description' => $validate['description'],
            'image' => $imagePath,
            'stock' => $validate['stock'],
            'category' => $validate['category'],
            'tags' => $validate['tags']
        ]); 
    
        if (isset($validate['tags'])) {
            $product->tags()->sync($validate['tags']);
        }
    
        return redirect()->route('products.show', $product->id);
    }

    // public function edit(Product $product)
    // {
    //     $this->authorize('update', $product);
    //     $categories = Category::all();

    //     return view('vacantes.edit', [
    //         'categories' => $categories
    //     ]);
    // }
}
