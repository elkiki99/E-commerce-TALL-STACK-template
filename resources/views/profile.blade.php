<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="w-full pb-10 mx-auto mt-16 space-y-6 lg:w-10/12 md:px-10">
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