<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $product->name }}
        </h2>
    </x-slot>
    
    
    <div class="flex w-full pb-10 mx-auto mt-16 xl:w-10/12 md:px-10">
        <div class="w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-200">
            <livewire:products.show-product :$product />
        </div>
    </div>
</x-app-layout>