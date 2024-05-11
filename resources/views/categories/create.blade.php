
<x-app-layout>        
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Upload new category') }}  
        </h2>
    </x-slot>

    <livewire:categories.create-category />
     
</x-app-layout>
