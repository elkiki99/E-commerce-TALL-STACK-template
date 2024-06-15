<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $category;

    protected $rules = [
        'category' => 'required|string|max:98'
    ];

    public function createCategory()
    {
        $data = $this->validate();

        Category::create([
            'category' => $data['category']
        ]);
        
        session()->flash('message', 'Category created successfully');
    }

    public function render()
    {
        return view('livewire.categories.create-category');
    }
}
