<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class ShowCategories extends Component
{
    protected $listeners = ['deleteCategory'];

    public function deleteCategory(Category $category)
    {
        $uncategorizedCategory = Category::firstOrCreate(['category' => 'uncategorized']);
        $category->products()->update(['category_id' => $uncategorizedCategory->id]);
        $category->delete();

        session()->flash('message', 'Category deleted successfully and products reassigned.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $categories = Category::latest()->paginate(24);

        return view('livewire.categories.show-categories', [
            'categories' => $categories
        ]);
    }
}
