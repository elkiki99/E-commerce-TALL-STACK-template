
<form class="space-y-5 md:w-1/2" novalidate wire:submit.prevent='editProduct'>  
    <div class="mt-4">
        <x-input-label for="name" :value="__('Product name')" />
        <x-text-input 
            id="name" 
            class="block w-full mt-1"
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
            class="block w-full mt-1"
            type="number"
            wire:model.fill="price"
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
            class="block w-full h-24 px-3 py-2 mt-1 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600"></textarea>
        </textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input 
            id="image"
            wire:model="new_image"
            type="file"
            class="block w-full mt-1"
            accept="image/*"
        />
        
        <div class="my-5 w-96">
            <x-input-label :value="__('Actual image')" />
            <img loading="lazy" src="{{ asset('storage/img/products/' . $image ) }}" alt="{{ $name }}" class="w-full h-full mb-4">
        </div>

        <div class="my-5 w-96">
            @if($new_image)
                Image:
                <img src="{{ $new_image->temporaryUrl() }}">
            @endif
        </div>

        <x-input-error :messages="$errors->get('new_image')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="stock" :value="__('Stock')" />
        <x-text-input 
            id="stock" 
            class="block w-full mt-1"
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
            wire:model.fill="category"
            class="block w-full mt-1"
        >
            <option selected disabled>-- Select category --</option>
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
                class="block w-full mt-1"
            >
                @foreach ($this->tags as $tag)
                    <option value="{{ $tag->id }}" 
                        {{ in_array($tag->id, old('tag', [])) ? 'selected' : '' }}
                    >{{ $tag->tag }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
        </div>
    </div>

    <x-primary-button>
        {{ __('Edit product') }}
    </x-primary-button>
    
    <style>
        .select2-search--inline {
            margin: 2rem 0rem 0rem 0rem;
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
                allowClear: true
            });
            $('#tags').on('change', function(){
                let data = $(this).val();
                $wire.tagId = data;
            });
        });
    </script>
@endscript
