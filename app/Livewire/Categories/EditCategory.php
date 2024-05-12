<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class EditCategory extends Component
{
    public $category_id;
    public $category;

    protected $rules = [
        'category' => 'required|string|max:98'
    ];

    public function mount(Category $category)
    {
        $this->category_id = $category->id;
        $this->category = $category->category;
    }

    public function editCategory()
    {
        $data = $this->validate();
        $category = Category::find($this->category_id);

        $category->category = $data['category'];
        $category->save();
        
        session()->flash('message', 'Category updated successfully');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.categories.edit-category');
    }
}
