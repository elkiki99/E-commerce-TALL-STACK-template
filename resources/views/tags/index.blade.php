<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Our tags') }}
        </h2>
    </x-slot>

    <div class="flex p-10 mx-auto md:w-3/4">
        <div class="w-full overflow-hidden bg-white rounded-lg shadow-md ">
            <h1 class="mt-10 text-2xl font-bold text-center">Manage tags</h1>

            <livewire:tags.show-tags />
        </div>
    </div>
</x-app-layout>