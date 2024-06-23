<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Your cart') }}
        </h2>
    </x-slot>

    <div class="w-full pb-10 mx-auto lg:w-10/12 md:px-10">
        {{-- <div class="sm:px-5"> --}}
            <button href="{{route('home')}}" class="flex p-5 dark:text-gray-500" wire:navigate><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
              </svg>
                Continue shopping</button>
            
                <div class="w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h1 class="mt-10 text-2xl font-bold text-center dark:text-gray-100">Go to checkout</h1>
                    
                    <livewire:cart.show-cart :cart="$cart" :payment="$payment" />
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
</x-app-layout>