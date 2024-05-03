<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'tag' => 'required|exists:tags,id',
        ]);

        $imagePath = $request->file('image')->store('public/products');
        $imageName = str_replace('public/products/', '', $imagePath);
    
        $product = Product::create([
            'name' => $validate['name'],
            'price' => $validate['price'],
            'description' => $validate['description'],
            'image_name' => $imageName,
            'stock' => $validate['stock'],
            'category_id' => $validate['category'],
        ]); 

        $product->tags()->attach($validate['tag']);

        session()->flash('message', 'Product created successfully');
        return redirect()->route('dashboard');
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
