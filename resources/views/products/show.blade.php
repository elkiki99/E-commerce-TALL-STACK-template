<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $product->name }}
        </h2>
    </x-slot>
    
    <div>
        <livewire:products.show-product :$product />
    </div>
</x-app-layout>