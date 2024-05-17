<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        return view('categories.index');
    }

    public function create()
    {
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
        $this->authorize('update', $category);
        return view('categories.edit', [
            'category' => $category
        ]);
    }
}
