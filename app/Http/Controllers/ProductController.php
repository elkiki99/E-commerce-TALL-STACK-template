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
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }

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
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }
        
        $this->authorize('update', $product);
        return view('products.edit', [
            'product' => $product
        ]);
    }
}
