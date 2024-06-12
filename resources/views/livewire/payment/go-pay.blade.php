<div class="mt-5">
    @if(session()->has('error'))
        <div class="py-4 text-red-500">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="checkout">
        <x-primary-button type="submit">Go to checkout</x-primary-button>
    </form>
</div>