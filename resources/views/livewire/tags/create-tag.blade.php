<form class="space-y-5 md:w-1/2" novalidate wire:submit.prevent='createTag'>
    <div class="mt-4">
        <x-input-label for="tag" :value="__('tag name')" />
        <x-text-input id="tag" class="block w-full mt-1" type="text" wire:model="tag" :value="old('tag')"
            placeholder="Ex.:Black" />

        <x-input-error :messages="$errors->get('tag')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="description" :value="__('Description')"/>
        <textarea id="description" wire:model="description" placeholder="Your tag description"
            class="block w-full h-24 px-3 py-2 mt-1 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5"></textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <x-primary-button>
        {{ __('Create tag') }}
    </x-primary-button>
</form>