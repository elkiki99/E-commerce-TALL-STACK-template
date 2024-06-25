<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="w-full pb-10 mx-auto lg:w-10/12 md:px-10">
        @if(auth()->user()->admin === 1)
            <button href="{{route('dashboard')}}" class="flex p-5 dark:text-gray-500" wire:navigate><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
                Back to dashboard
            </button>
        @else
            <button href="{{route('home')}}" class="flex p-5 dark:text-gray-500" wire:navigate><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
                Back to home
            </button>
        @endif
        
        <div>
            <div class="w-full bg-white rounded-lg shadow-md last:overflow-hidden dark:bg-gray-800">
                <div class="p-10 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="w-full bg-white rounded-lg shadow-md last:overflow-hidden dark:bg-gray-800">
                <div class="p-10 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="w-full bg-white rounded-lg shadow-md last:overflow-hidden dark:bg-gray-800">
                <div class="p-10 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>