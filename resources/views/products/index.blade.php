
<x-app-layout>        
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Our collection') }}  
        </h2>
    </x-slot>

    <div>
        <livewire:products.show-products />
    </div>
</x-app-layout>
