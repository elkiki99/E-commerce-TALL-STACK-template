
<form class="pb-10 space-y-5 md:w-1/2" novalidate wire:submit.prevent='createProduct'>
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="mt-4">
        <x-input-label for="name" :value="__('Product name')" />
        <x-text-input 
            id="name" 
            class="block w-full mt-1 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
            type="text"
            wire:model="name"
            :value="old('name')"
            placeholder="Nike shoes"
        />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    
    <div class="mt-4">
        <x-input-label for="price" :value="__('Price')" />
        <x-text-input 
            class="block w-full mt-1 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
            type="number"
            wire:model="price"
            :value="old('price')"
            placeholder="49.99"
        />

        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="description" :value="__('Description')" />
        <textarea
            id="description"
            wire:model="description"
            placeholder="Your product description"
            class="block w-full h-48 px-3 py-2 mt-1 placeholder-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none dark:placeholder-gray-500 focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm sm:leading-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600"></textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input 
            id="image"
            wire:model="image"
            type="file"
            class="block w-full mt-1 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
            accept="image/*"
        />

        <div class="my-5 w-96">
            @if($image)
                <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</p>
                <img class="w-full h-full mb-4" src="{{ $image->temporaryUrl() }}" alt="">
            @endif
        </div>

        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="stock" :value="__('Stock')" />
        <x-text-input 
            id="stock" 
            class="block w-full mt-1 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
            type="number"
            wire:model="stock"
            :value="old('stock')"
            placeholder="23"
        />

        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="category" :value="__('Category')" />
        <x-select
            id="category" 
            wire:model="category"
            class="block w-full mt-1 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
        >
            <option selected>-- Select category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </x-select>

        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="tagId" :value="__('Tags')" />
    
        <div wire:ignore>
            <select
                id="tags"
                multiple
                wire:model="tagId"
                class="block w-full mt-1 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
            >
                @foreach ($this->tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                @endforeach
            </select>
    
            <x-input-error :messages="$errors->get('tagId')" class="mt-2" />
        </div>
    </div>

    <x-primary-button>
        {{ __('Create product') }}
    </x-primary-button>

    <style>
        .select2-search--inline {
            color: black;
            margin: 2rem 0rem 0rem 0rem;
        }
        .select2-selection__choice {
            color: black;
        }
        .select2-selection {
            height: 2.5rem;
        }
    </style>
</form>

@script()
    <script>
        $(document).ready(function() {
            $('#tags').select2({
                theme: 'classic',
                placeholder: "-- Select tag --",
                allowClear: true,
            });
            $('#tags').on('change', function(){
                let data = $(this).val();
                $wire.tagId = data;
            });
        });
    </script>
@endscript
