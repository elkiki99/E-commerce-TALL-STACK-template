<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowCategories extends Component
{
    use WithPagination;
    public $searchCategory = '';

    protected $listeners = ['deleteCategory'];

    public function deleteCategory(Category $category)
    {
        $uncategorizedCategory = Category::firstOrCreate(['category' => 'uncategorized']);
        $category->products()->update(['category_id' => $uncategorizedCategory->id]);
        $category->delete();

        session()->flash('message', 'Category deleted successfully and products reassigned.');
        return redirect()->route('categories.index');
    }

    public function updating($key)
    {
        if ($key === 'searchCategory') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $categories = Category::latest()
            ->when($this->searchCategory !== '', fn(Builder $query) => $query->where('category', 'like', '%' . $this->searchCategory . '%'))
            ->paginate(24);

        return view('livewire.categories.show-categories', [
            'categories' => $categories
        ]);
    }
}
