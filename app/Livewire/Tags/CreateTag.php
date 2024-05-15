<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;

class CreateTag extends Component
{
    public $tag;
    public $description;

    protected $rules = [
        'tag' => 'required|string|max:98',
        'description' => 'required|string'
    ];

    public function createTag()
    {
        $data = $this->validate();

        Tag::create([
            'tag' => $data['tag'],
            'description' => $data['description']
        ]);
        
        session()->flash('message', 'Tag created successfully');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.tags.create-tag');
    }
}
