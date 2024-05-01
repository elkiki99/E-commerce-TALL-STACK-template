<div class="flex gap-2 p-2">
    <div>
        <button wire:click="decrement">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
            </svg>              
        </button>
    </div>
    <div class="w-8 text-xl font-bold text-center" id="quantityDisplay">
        <p>{{ $count }}</p>
    </div>
    <div>
        <button wire:click="increment">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>    
        </button>
    </div>
</div>
