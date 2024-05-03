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
        $products = Product::latest()->paginate(24);

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

    public function edit($id)
    {
        $product = Product::findOrFail($id);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:98',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'stock' => 'required|integer|min:0',
            'category' => 'required|exists:categories,id',
            'tag' => 'required|exists:tags,id',
        ]);
    
        // Actualizar el nombre, precio, descripción, stock y categoría
        $product->update([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category'],
        ]);
    
        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');
            $imageName = str_replace('public/products/', '', $imagePath);
            $product->update(['image_name' => $imageName]);
        }
    
        // Actualizar las etiquetas del producto
        $product->tags()->sync([$validatedData['tag']]);
    
        session()->flash('message', 'Product updated successfully');
        return redirect()->route('dashboard');
    }
}
