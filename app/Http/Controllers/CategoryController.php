<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }

        $this->authorize('viewAny', Category::class);
        return view('categories.index');
    }

    public function create()
    {
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }

        $this->authorize('create', Category::class);
        return view('categories.create');
    }
    
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        if(auth()->user()->admin === 0) {
            return redirect()->route('home');
        }
        
        $this->authorize('update', $category);
        return view('categories.edit', [
            'category' => $category
        ]);
    }
}
