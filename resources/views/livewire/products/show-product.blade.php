<div>      
    <div>
        @if($product->stock < 1)
            <div class="relative top-0 left-0 z-10 flex items-center justify-center w-full h-full bg-red-500 bg-opacity-75">
                <span class="font-semibold text-white text-md">NO STOCK</span>
            </div>
        @endif
    </div>

    <div class="relative">
        <div class="lg:flex">   
            <div class="relative flex items-center justify-center p-4 bg-gray-100 dark:bg-gray-300 lg:w-1/2">
                <button href="{{route('categories.show', $product->category)}}" class="absolute top-0 left-0 flex p-5 dark:text-gray-500" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to {{$product->category->category}}
                </button>
                <img class="object-contain w-full h-full lg:object-cover max-h-96" loading="lazy" src="{{ asset('storage/img/products/' . $product->image )}}" alt="{{ $product->name }}">
            </div>
            
            <div class="flex flex-col justify-between p-4 lg:w-1/2">
                <div>
                    <a class="mt-4 text-blue-600 text-md dark:text-blue-400" href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->category }}</a>
                    <h2 class="mt-2 text-3xl font-semibold text-gray-800 dark:text-gray-300">{{ $product->name }} <span class="text-sm text-blue-400"></span></h2>
                    <p class="text-blue-600 dark:text-blue-400">10% OFF</p>
                    <p class="mt-2 text-4xl text-gray-900 dark:text-gray-200">${{ $product->price }}</p>
                                        
                    <div class="flex flex-wrap mt-4">
                        @foreach ($tags as $tag)
                            <a href="{{ route('tags.show', ['tag' => $tag->id]) }}" class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full dark:text-gray-300 dark:bg-gray-700">
                                {{ $tag->tag }}
                            </a>
                        @endforeach
                    </div>
                    
                    <p class="mt-4 text-gray-500 break-words text-md dark:text-gray-300">{!! $product->description !!}</p>
                </div>
                
                @if(auth()->check() && auth()->user()->admin === 1)
                    <div class="my-2 mt-auto ml-auto">
                        <div class="flex flex-row m-5">
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="px-2 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-2 text-blue-600 dark:text-blue-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487L18.55 2.8a1.875 1.875 0 012.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zM16.863 4.487L19.5 7.125"/>
                                </svg>
                            </a>
                            <button type="button" wire:click="$dispatch('showAlert', {{ $product->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-2 text-blue-600 dark:text-blue-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9L14.394 18m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="py-2 mt-5 mr-auto ">
                        @if($product->stock > 0)
                            @livewire('cart.add-to-cart', ['productId' => $product->id])
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
    
@script
    <script>
        Livewire.on('showAlert', (productId) => {
            Swal.fire({
                title: 'Delete this product?',
                text: 'This action cannot be restored',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'The product was deleted',
                        'Deleted succesfully',
                        'success'
                    );
                    window.setTimeout(() => {
                        @this.call('deleteProduct', productId);
                    }, 1500);
                }
            })
        });
    </script>
@endscript