<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if(auth()->user()->admin === 1)
                {{ __('Order details') }}
            @else
                {{ __('Your order') }}
            @endif
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mt-5 text-2xl font-bold text-center">
                        @if (auth()->user()->admin === 1)
                            Manage order
                        @else
                            Track your order
                        @endif
                    </h1>

                    <livewire:orders.show-order :payment="$payment" />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
