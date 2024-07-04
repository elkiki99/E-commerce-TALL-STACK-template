<div 
    class="flex items-center flex-grow pl-1 mt-2"
>
    <div class="ml-auto" x-data="{ quantity: 1 }" >
        <x-secondary-button 
            type="button"
            x-on:click.prevent="$wire.addToCart(quantity).then(() =>$dispatch('open-modal', 'add-to-cart-{{ $productId }}'))"
            class="flex items-center justify-center rounded-md md:w-auto"
        >
            <p>Add</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 dark:text-gray-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
        </x-secondary-button>  
    </div>
    
    <x-modal name="add-to-cart-{{ $productId }}" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Product added successfully!') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Your product was added to your shopping cart') }}
            </p>

            <div class="flex justify-start mt-6 md:justify-end">
                <a href="{{ route('cart.show') }}" class="text-violet-500">{{ __('Go to cart') }}</a>
            </div>
        </div>
    </x-modal>
</div>