<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Our tags') }}
        </h2>
    </x-slot>

    <div class="flex w-full pb-10 mx-auto mt-10 lg:w-10/12 md:px-10">
        <div class="w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="mt-10 text-2xl font-bold text-center dark:text-gray-100">Manage tags</h1>

            <livewire:tags.show-tags />
        </div>
    </div>
</x-app-layout>