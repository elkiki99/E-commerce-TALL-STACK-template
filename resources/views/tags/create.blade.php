<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Upload new tag') }}  
        </h2>
    </x-slot>

    <div class="flex w-full pb-10 mx-auto mt-16 lg:w-10/12 md:px-10">
        <div class="w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="mt-10 text-2xl font-bold text-center dark:text-gray-100">Create new tag</h1>
            
            <div class="p-5 md:flex md:justify-center">
                <livewire:tags.create-tag />
            </div>
        </div>
    </div>     
</x-app-layout>
