<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $productId;
    
    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function increment()
    {
        $this->count++;
        $this->dispatch('quantityUpdated', $this->productId, $this->count);
    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count--;
            $this->dispatch('quantityUpdated', $this->productId, $this->count);
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
