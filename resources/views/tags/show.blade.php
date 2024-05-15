
<x-app-layout>        
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $tag->tag }}  
        </h2>
    </x-slot>

    <livewire:tags.show-tag :$tag />
     
</x-app-layout>
