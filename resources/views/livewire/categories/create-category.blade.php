
<form class="pb-10 space-y-5 md:w-1/2" novalidate wire:submit.prevent='createCategory'>
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif
    
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
        {{ __('Create category') }}
    </x-primary-button>
</form>