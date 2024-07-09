<div class="flex flex-col p-10 text-gray-900 dark:text-gray-100">
    @if(!$likes->isEmpty())
        @foreach($likes as $product)
            <div
                wire:key="{{ $product->id }}"
                wire:loading.class="opacity-50"
                wire:target="remove({{ $product->id }})"
                class="w-full mb-5 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800 dark:text-gray-200"
            >
                <div>
                    @if($product->stock < 1)
                        <div class="relative top-0 left-0 z-10 flex items-center justify-center w-full h-full bg-red-500 bg-opacity-75">
                            <span class="p-1 font-semibold text-white text-md">SOLD OUT</span>
                        </div>
                    @endif
                </div>
                
                <div class="relative">
                    <div class="lg:flex">   
                        <div class="relative flex items-center justify-center p-4 bg-gray-100 dark:bg-gray-300 lg:w-1/2">
                            <button
                                    wire:key="remove-{{ $product->id }}" 
                                    wire:click="remove({{ $product->id }})"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" 
                                    stroke-width="1" 
                                    stroke="currentColor" 
                                    class="absolute z-10 w-10 h-10 ml-auto mr-2 text-red-500 transition-transform duration-200 transform fill-current hover:scale-125 right-2 top-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                <img class="object-cover w-auto h-auto transition-transform duration-200 transform hover:scale-105 lg:object-cover max-h-96" loading="lazy" src="{{ asset('storage/img/products/' . $product->image )}}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        
                        <div class="flex flex-col justify-between p-4 pb-0 lg:w-1/2 lg:pb-10">
                            <div>
                                <a class="mt-4 text-blue-600 text-md dark:text-blue-400" href="{{ route('categories.show', ['category' => $product->category->id]) }}">{{ $product->category->category }}</a>
                                
                                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                    <h2 class="mt-2 text-3xl font-semibold text-gray-800 dark:text-gray-300">{{ $product->name }} <span class="text-sm text-blue-400"></span></h2>
                                </a>
                                <p class="text-blue-600 dark:text-blue-400">10% OFF</p>
                                <p class="mt-2 text-4xl text-gray-900 dark:text-gray-200">${{ $product->price }}</p>

                                <livewire:products.product-ranking :product="$product" />
                                                    
                                <div class="flex flex-wrap mt-4">
                                    @foreach ($product->tags as $tag)
                                        <a href="{{ route('tags.show', ['tag' => $tag->id]) }}" class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full dark:text-gray-300 dark:bg-gray-700">
                                            {{ $tag->tag }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="my-5">
                                @if($product->stock > 0)
                                    @livewire('cart.add-to-cart', ['productId' => $product->id])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mx-5 lg:mx-0">
            <x-danger-button 
                class="flex items-center justify-center w-full mt-5 text-center md:w-auto" 
                type="button"
                x-on:click.prevent="$dispatch('open-modal', 'confirm-remove-likes')">Remove likes
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </x-danger-button>
        
            <x-modal name="confirm-remove-likes" :show="$errors->isNotEmpty()" focusable>
                <form wire:submit="removeAllLikes" class="p-6">
        
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to clear your likes?') }}
                    </h2>
        
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('You won\'t be able to revert this!') }}
                    </p>
        
                    <div class="flex justify-end mt-6">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>
        
                        <x-danger-button class="ms-3">
                            {{ __('Remove likes') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </div>     
           
        <div class="justify-end w-full px-5 pt-5">
            {{ $likes->links() }}
        </div>
    @else
        <div class="justify-end w-full px-5 py-5">
            <a wire:navigate href="{{ route('home') }}" class="my-5 text-gray-500">No likes found!<span class="text-violet-500"> Go shopping!</span></a>
        </div>
    @endif
</div>