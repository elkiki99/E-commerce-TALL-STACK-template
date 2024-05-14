
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $product->name }}
        </h2>
    </x-slot>
    
    <div class="flex justify-center pt-10">
        <div class="bg-white rounded-lg shadow-md  sm:w-auto xl:w-1/2 md:w-3/4">
            <livewire:products.show-product :$product />
        </div>
    </div>
</x-app-layout>