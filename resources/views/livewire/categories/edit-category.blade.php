
<form class="space-y-5 md:w-1/2" novalidate wire:submit.prevent='editCategory'>
    <div class="mt-4">
        <x-input-label for="category" :value="__('Category name')" />
        <x-text-input 
            id="category" 
            class="block w-full mt-1"
            type="text"
            wire:model="category"
            :value="old('category')"
            placeholder="Ex.:Hoodies"
        />

        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>
    
    <x-primary-button>
        {{ __('Update category') }}
    </x-primary-button>
</form>