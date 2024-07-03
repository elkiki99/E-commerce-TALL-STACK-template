<div>
    <x-danger-button 
        class="flex items-center justify-center w-full text-center md:w-auto" 
        type="button"
        x-on:click.prevent="$dispatch('open-modal', 'confirm-clear-cart')">Clear cart
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </x-danger-button>

    <x-modal name="confirm-clear-cart" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="clearCart" class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to clear your cart?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('You won\'t be able to revert this!') }}
            </p>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Clear cart') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>