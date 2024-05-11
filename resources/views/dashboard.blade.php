<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                @if(auth()->user()->admin === 1)
                    <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">
                        <a wire:navigate href="{{route('products.create')}}" class="m-2">
                            <x-primary-button>Create new product!</x-primary-button>
                        </a>
                        <a wire:navigate href="{{route('categories.create')}}" class="m-2">
                            <x-primary-button>Create new category!</x-primary-button>
                        </a>
                    </div>
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-primary-button>View my products!</x-primary-button>
                    </div>
                @endif
            </div>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
