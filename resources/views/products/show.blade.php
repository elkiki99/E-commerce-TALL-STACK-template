
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $product->name }}
        </h2>
    </x-slot>
    
    <div class="flex justify-center py-10">
        <div class="w-full bg-white rounded-lg shadow-md sm:w-3/4 xl:w-2/3">
            <livewire:products.show-product :$product />
        </div>
    </div>
</x-app-layout>