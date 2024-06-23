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
        if($category->products->count() === 0) {
            $category->delete();
            session()->flash('message', 'Category deleted successfully.');
            return redirect()->route('categories.index');

        } else {
            $uncategorizedCategory = Category::firstOrCreate(['category' => 'Uncategorized']);
            $category->products()->update(['category_id' => $uncategorizedCategory->id]);
            $category->delete();

            session()->flash('message', 'Category deleted successfully.');
            return redirect()->route('categories.index');
        }
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
            ->paginate(12);

        return view('livewire.categories.show-categories', [
            'categories' => $categories
        ]);
    }
}
