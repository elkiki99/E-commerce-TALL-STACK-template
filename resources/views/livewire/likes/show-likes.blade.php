<div class="w-full pb-10 mx-auto mt-16 xl:w-10/12 md:px-10 ">
    @if(!$likes->isEmpty())
        @foreach($likes as $product)
            <div class="w-full overflow-hidden bg-white border-b-4 rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-200"> 
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
                            <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                <img class="object-cover w-auto h-auto transition-transform duration-200 transform hover:scale-105 lg:object-cover max-h-96" loading="lazy" src="{{ asset('storage/img/products/' . $product->image )}}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        
                        <div class="flex flex-col justify-between p-4 pb-0 lg:w-1/2 lg:pb-10">
                            <div>
                                <a class="mt-4 text-blue-600 text-md dark:text-blue-400" href="{{ route('categories.show', ['category' => $product->category->id]) }}">{{ $product->category->category }}</a>
                            
                                <h2 class="mt-2 text-3xl font-semibold text-gray-800 dark:text-gray-300">{{ $product->name }} <span class="text-sm text-blue-400"></span></h2>
                                <p class="text-blue-600 dark:text-blue-400">10% OFF</p>
                                <p class="mt-2 text-4xl text-gray-900 dark:text-gray-200">${{ $product->price }}</p>

                                <livewire:product.product-rating :product="$product" />
                                                    
                                <div class="flex flex-wrap mt-4">
                                    @foreach ($product->tags as $tag)
                                        <a href="{{ route('tags.show', ['tag' => $tag->id]) }}" class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full dark:text-gray-300 dark:bg-gray-700">
                                            {{ $tag->tag }}
                                        </a>
                                    @endforeach
                                </div>
                                
                                {{-- <p class="mt-4 text-gray-500 break-words text-md dark:text-gray-300">{!! $product->description !!}</p> --}}
                            </div>
                            
                            @if(auth()->check() && auth()->user()->admin === 1)
                                <div class="my-2 mt-auto ml-auto">
                                    <div class="flex flex-row m-5">
                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="px-2 mr-2">
                                        </a>
                                        <button type="button" wire:click="$dispatch('showAlert', {{ $product->id }})"></button>
                                    </div>
                                </div>
                            @else
                                <div class="my-5">
                                    @if($product->stock > 0)
                                        @livewire('cart.add-to-cart', ['productId' => $product->id])
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>