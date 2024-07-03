<?php

namespace App\Livewire\Likes;

use App\Models\Like;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowLikes extends Component
{
    public $product;
    public $tags;
    public $likedProducts;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->category = $this->product->category;
        $this->tags = $this->product->tags;
    }

    public function remove($product)
    {
        $product = Like::where('user_id', auth()->user()->id)->where('product_id', $product)->first();
        if ($product) {
            $product->delete();
        }
    }
    
    public function render()
    {
        $likes = Auth::user()->likedProducts()->with('likes')->get();

        return view('livewire.likes.show-likes', [
            'likes' => $likes
        ]);
    }
}
