<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;

class ShowTag extends Component
{
    public $tag;
    public $products;

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
        $this->products = $tag->products()->get();
    }

    public function render()
    {
        {
            if($this->products->count() > 24) {
                $this->products = $this->tag->products()->paginate(24);
            }
            return view('livewire.tags.show-tag', [
                'products' => $this->products
            ]);
        } 
    }
}
