<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('message'))
            <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>