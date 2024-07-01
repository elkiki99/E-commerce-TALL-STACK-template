<?php

namespace App\Livewire\Likes;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ShowLikes extends Component
{
    public $category;
    public $product;
    public $tags;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->category = $this->product->category;
        $this->tags = $this->product->tags;
    }
    
    public function render()
    {
        $likes = Auth::user()->likedProducts()->with('likes')->get();

        return view('livewire.likes.show-likes', [
            'likes' => $likes
        ]);
    }
}
