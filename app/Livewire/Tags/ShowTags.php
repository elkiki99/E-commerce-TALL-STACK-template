<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;

class ShowTags extends Component
{
    protected $listeners = ['deleteTag'];

    public function deleteTag(Tag $tag)
    {
        $tag->products()->detach();
        $tag->delete();
        session()->flash('message', 'Tag deleted successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        $tags = Tag::latest()->paginate(24);

        return view('livewire.tags.show-tags', [
            'tags' => $tags
        ]);
    }
}
