<div class="mt-5 md:flex-wrap md:p-5">
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex py-5">
        <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model.live="searchProduct" type="text" id="simple-search"
                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search product..." required="">
            </div>
        </form>
        <div>
            <select wire:model.live="searchCategory" class=" dark:bg-gray-900 dark:text-gray-200 dark:border-gray-600 py-2.5 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 hover:cursor-pointer focus:outline-none focus:ring-0 focus:border-gray-200"> 
                <option value="0">Select category</option>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}"> {{ $category }} </option>
                @endforeach
            </select>
        </div>
    </div>
    
    <ul class="grid w-full gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-6">
        @foreach ($products as $product)
            <li wire:key="{{ $product->id }}" class="flex flex-col mb-4">
                <div class="relative flex flex-col h-full overflow-hidden shadow-md rounded-2xl dark:bg-gray-800">
                    @if($product->stock < 1)
                        <div class="top-0 left-0 z-10 flex items-center justify-center w-full h-full bg-red-500 bg-opacity-75">
                            <span class="text-lg font-semibold text-white">NO STOCK</span>
                        </div>
                    @endif
                    <div class="flex items-center justify-center bg-gray-200 dark:bg-gray-300">
                        <a wire:navigate href="{{ route('products.show', ['product' => $product->id]) }}">
                            <img class="object-cover w-64 h-64" loading="lazy" src="{{ asset('storage/img/products/' . $product->image ) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="mx-5">
                        <a wire:navigate href="{{ route('products.show', ['product' => $product->id]) }}">
                            <h2 class="mt-2 font-semibold text-gray-800 dark:text-gray-200">{{ $product->name }} <span class="text-sm text-blue-400"> - 10%</span></h2>
                        </a>
                    </div>
                        
                    @if(auth()->check() && auth()->user()->admin === 1)
                        <div class="flex flex-row mx-5 mb-4">
                            <div class="flex flex-col flex-grow">
                                <p class="mt-2 text-4xl text-gray-900 dark:text-gray-200">${{ $product->price }}</p>
                            </div>
                            
                            <div class="flex">
                                <div class="flex items-center ">
                                    <a wire:navigate href="{{route('products.edit', ['product' => $product->id])}}" class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                            stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6 text-blue-600 dark:text-blue-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </div>
                                    <div class="flex items-center">
                                    <button type="button" class="mr-2" wire:click="$dispatch('showAlert', {{$product->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-6 h-6 text-blue-600 dark:text-blue-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>   
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mx-5 mb-4">
                            <p class="text-3xl font-semibold text-gray-900 dark:text-gray-200">${{ $product->price }}</p>
                            @if(!$product->stock < 1)
                                @livewire('cart.add-to-cart', ['productId' => $product->id])
                            @endif
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>

    <div class="justify-end w-full px-5 py-5">
        {{ $products->links() }}
    </div>
</div> 

@script
    <script>
        Livewire.on('showAlert', (productId) => {
            Swal.fire({
                title: 'Are you sure?',
                title: 'Delete this product?',
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

    <script>
        Livewire.on('showAddToCart', (productId) => {
            Swal.fire({
                title: '¡Product added successfully!',
                text: 'Your product was added to your shopping cart.',
                icon: 'success',
                confirmButtonText: 'OK'
            });

            window.setTimeout(() => {
                @this.call('addToCart', productId);
            }, 500);
        });
    </script> 
@endscript