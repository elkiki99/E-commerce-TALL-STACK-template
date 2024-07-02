<?php

namespace App\Livewire\Likes;

use App\Models\Like;
use Livewire\Component;

class LikeCounter extends Component
{
    public $likesCount = 0;
    
    protected $listeners = ['likesUpdated' => 'updateLikesCount'];

    public function mount()
    {
        $this->updateLikesCount();
    }

    public function updateLikesCount()
    {
        if (auth()->check()) {
            $this->likesCount = Like::where('user_id', auth()->user()->id)->count();
        }
    }

    public function render()
    {
        return view('livewire.likes.like-counter');
    }
}
