<?php

namespace App\Livewire\Likes;

use App\Models\Like;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowLikes extends Component
{
    public $product;
    public $likedProducts;

    public function remove($product)
    {
        $product = Like::where('user_id', auth()->user()->id)->where('product_id', $product)->first();
        if ($product) {
            $product->delete();
            $this->dispatch('likesUpdated');
        }
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    
    public function render()
    {
        $likes = Auth::user()->likedProducts()->with('likes')->get();

        return view('livewire.likes.show-likes', [
            'likes' => $likes
        ]);
    }
}
