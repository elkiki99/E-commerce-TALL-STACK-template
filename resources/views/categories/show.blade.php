
<x-app-layout>        
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $category->category }}  
        </h2>
    </x-slot>

    <livewire:categories.show-category :$category />
     
</x-app-layout>
