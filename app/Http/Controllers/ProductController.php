<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        return view('products.create');
    }
    
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }
    
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('products.edit', [
            'product' => $product
        ]);
    }
}
