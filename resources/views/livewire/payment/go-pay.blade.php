<div class="mt-5">
    @if(session()->has('error'))
        <div class="py-4 text-red-500">
            {{ session('error') }}
        </div>
    @endif

    <div class="mt-5 sm:flex">
        {{-- <x-secondary-button 
            class="mx-0 mb-5 sm:mr-5 md:mb-0"
            wire:navigate
            href="{{ route('cart.show') }}"
        ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
          </svg>Back to cart</x-secondary-button> --}}

        <form wire:submit.prevent="checkout">
            <x-primary-button> Go pay
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
            </x-primary-button>
        </form>
    </div>
</div>