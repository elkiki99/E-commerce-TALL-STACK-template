
<form class="space-y-5 md:w-1/2" wire:submit.prevent='createCategory'>
    <div class="mt-4">
        <x-input-label for="name" :value="__('Category name')" />
        <x-text-input 
            id="name" 
            class="block w-full mt-1"
            type="text"
            wire:model="name"
            :value="old('name')"
            placeholder="Hoodies"
        />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    
    <x-primary-button>
        {{ __('Create category') }}
    </x-primary-button>
</form>