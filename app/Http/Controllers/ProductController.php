<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {   
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
        return view('products.edit', [
            'product' => $product
        ]);
    }
}
