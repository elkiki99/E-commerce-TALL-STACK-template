<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowTags extends Component
{
    use WithPagination;
    public $searchTag = '';

    protected $listeners = ['deleteTag'];

    public function deleteTag(Tag $tag)
    {
        $tag->products()->detach();
        $tag->delete();
        session()->flash('message', 'Tag deleted successfully.');
        return redirect()->route('tags.index');
    }

    public function updating($key)
    {
        if ($key === 'searchTag') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $tags = Tag::latest()
        ->when($this->searchTag !== '', fn(Builder $query) => $query->where('tag', 'like', '%' . $this->searchTag . '%'))
        ->paginate(24);

        return view('livewire.tags.show-tags', [
            'tags' => $tags
        ]);
    }
}
