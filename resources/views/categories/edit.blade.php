
<x-app-layout>        
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $category->category }}  
        </h2>
    </x-slot>

    <div class="mb-10 md:py-12 md:mb-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <button href="{{route('categories.index')}}" class="flex p-5 dark:text-gray-500" wire:navigate><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
              </svg>
              Back to categories</button>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="my-5 text-2xl font-bold text-center">Update category</h1>
                    <div class="p-5 md:flex md:justify-center">
                        <livewire:categories.edit-category :$category />
                    </div>
                </div>
            </div>
        </div>     
</x-app-layout>