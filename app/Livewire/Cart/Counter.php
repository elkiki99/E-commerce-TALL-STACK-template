<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $productId;
    
    protected $listeners = ['updateCount'];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->updateCount();
    }

    public function increment()
    {
        $this->count++;
        $this->dispatch('countUpdated', $this->count);
    }

    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--;
            $this->dispatch('countUpdated', $this->count);
        }
    }

    public function updateCount()
    {

    }

    public function render()
    {
        return view('livewire.cart.counter');
    }
}