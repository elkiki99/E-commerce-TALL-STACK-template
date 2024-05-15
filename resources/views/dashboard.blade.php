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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Product Management</h3>
                    <div class="grid grid-cols-1 gap-4 my-4">
                        <a wire:navigate href="{{ route('products.create') }}" class="m-2">
                            <x-primary-button>Create new product</x-primary-button>
                        </a>
                        <a wire:navigate href="{{ route('products.index') }}" class="m-2">
                            <x-primary-button>View all products</x-primary-button>
                        </a>
                        {{-- <a wire:navigate href="{{ route('products.edit') }}" class="m-2">
                            <x-primary-button>Edit product</x-primary-button>
                        </a>
                        <a wire:navigate href="{{ route('products.delete') }}" class="m-2">
                            <x-primary-button>Delete product</x-primary-button>
                        </a> --}}
                    </div>

                    <h3 class="mt-6 text-lg font-semibold">Category Management</h3>
                    <div class="grid grid-cols-1 gap-4 my-4">
                        <a wire:navigate href="{{ route('categories.create') }}" class="m-2">
                            <x-primary-button>Create new category</x-primary-button>
                        </a>
                        <a wire:navigate href="{{ route('categories.index') }}" class="m-2">
                            <x-primary-button>View all categories</x-primary-button>
                        </a>
                        {{-- <a wire:navigate href="{{ route('categories.edit') }}" class="m-2">
                            <x-primary-button>Edit category</x-primary-button>
                        </a>
                        <a wire:navigate href="{{ route('categories.delete') }}" class="m-2">
                            <x-primary-button>Delete category</x-primary-button>
                        </a> --}}
                    </div>

                    <h3 class="mt-6 text-lg font-semibold">Tags Management</h3>
                    <div class="grid grid-cols-1 gap-4 my-4">
                        <a wire:navigate href="{{ route('tags.create') }}" class="m-2">
                            <x-primary-button>Create new tag</x-primary-button>
                        </a>
                        <a wire:navigate href="{{ route('tags.index') }}" class="m-2">
                            <x-primary-button>View all tags</x-primary-button>
                        </a>
                        {{-- <a wire:navigate href="{{ route('categories.edit') }}" class="m-2">
                            <x-primary-button>Edit category</x-primary-button>
                        </a>
                        <a wire:navigate href="{{ route('categories.delete') }}" class="m-2">
                            <x-primary-button>Delete category</x-primary-button>
                        </a> --}}
                    </div>
                </div>
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button wire:navigate href="{{ route('products.index') }}">View my products
                    </x-primary-button>
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