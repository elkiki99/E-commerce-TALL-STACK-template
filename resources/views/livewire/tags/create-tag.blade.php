<form class="pb-10 space-y-5 md:w-1/2" novalidate wire:submit.prevent='createTag'>
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif
        
    <div class="mt-4">
        <x-input-label for="tag" :value="__('Tag name')" />
        <x-text-input id="tag" class="block w-full mt-1" type="text" wire:model="tag" :value="old('tag')"
            placeholder="Ex.:Black" />

        <x-input-error :messages="$errors->get('tag')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="description" :value="__('Description')"/>
        <textarea id="description" wire:model="description" placeholder="Your tag description"
        class="block w-full h-24 px-3 py-2 mt-1 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none dark:placeholder-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm sm:leading-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600"></textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <x-primary-button>
        {{ __('Create tag') }}
    </x-primary-button>
</form>