<?php

namespace App\Livewire\Likes;

use App\Models\Like;
use Livewire\Component;

class AddToLikes extends Component
{
    public $product;
    public $isLiked;

    public function mount($product)
    {
        $this->product = $product;
        $this->isLiked = Like::where('user_id', auth()->id())
                            ->where('product_id', $this->product->id)
                            ->exists();
    }

    public function addToLikes()
    {
        if ($this->isLiked) {
            $this->removeFromLikes();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'product_id' => $this->product->id,
            ]);
            $this->isLiked = true;
        }
        $this->dispatch('likesUpdated');
    }

    public function removeFromLikes()
    {
        Like::where('user_id', auth()->id())
            ->where('product_id', $this->product->id)
            ->delete();
            
        $this->isLiked = false;
        $this->dispatch('likeRemoved', $this->product->id);
        $this->dispatch('likesUpdated');
    }

    public function render()
    {
        return view('livewire.likes.add-to-likes');
    }
}