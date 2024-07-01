
<x-app-layout>        
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Your Likes') }}  
        </h2>
    </x-slot>

    <div>
        <livewire:likes.show-likes />
    </div>
</x-app-layout>
