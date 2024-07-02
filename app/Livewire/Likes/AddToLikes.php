<?php

namespace App\Livewire\Likes;

use App\Models\Like;
use Livewire\Component;

class AddToLikes extends Component
{
    public $product;

    public function addToLikes()
    {
        $like = Like::where('user_id', auth()->user()->id)
                    ->where('product_id', $this->product->id)
                    ->first();

        if(!$like) {
            Like::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product->id,
            ]);
        } else {
            $like->delete();
        }

        $this->dispatch('triggerModal');

    }

    public function render()
    {
        return view('livewire.likes.add-to-likes');
    }
}
