
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $product->name }}
        </h2>
    </x-slot>
    
    <div class="flex max-w-3xl p-10 mx-auto">
        <div class="flex flex-auto overflow-hidden bg-white rounded-lg shadow-md">
            <livewire:products.show-product :$product />
        </div>
    </div>
</x-app-layout>