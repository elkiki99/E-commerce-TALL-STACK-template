<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;

class EditTag extends Component
{
    public $tag_id;
    public $tag;
    public $description;

    protected $rules = [
        'tag' => 'required|string|max:98',
        'description' => 'required|string'
    ];

    public function mount(Tag $tag)
    {
        $this->tag_id = $tag->id;
        $this->tag = $tag->tag;
        $this->description = $tag->description;
    }

    public function updateTag()
    {
        $data = $this->validate();
        $tag = Tag::find($this->tag_id);

        $tag->tag = $data['tag'];
        $tag->description = $data['description'];
        $tag->save();
        
        session()->flash('message', 'Tag updated successfully');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.tags.edit-tag');
    }
}
