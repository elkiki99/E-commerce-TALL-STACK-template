<div class="flex flex-wrap p-10">
    <ul class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($products as $product)
            <li wire:key="{{ $product->id }}" class="flex flex-col mb-4">
                <div class="flex flex-col h-full overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center">
                        <a wire:navigate href="{{ route('products.show', ['product' => $product->id]) }}">
                            <img class="object-contain w-full h-48 pt-5" loading="lazy" src="{{ asset('storage/img/products/' . $product->image ) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="flex flex-col flex-grow px-6 py-2">
                        <p class="text-2xl font-normal text-green-500">${{ $product->price }}</p>
                        <a wire:navigate href="{{ route('products.show', ['product' => $product->id]) }}">
                            <h2 class="mt-2 text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
                        </a>
                    </div>
                    
                    @if(auth()->check() && auth()->user()->admin === 1)
                        <div class="my-2 mt-auto">
                            <div class="flex flex-row mt-5">
                                <a wire:navigate href="{{route('products.edit', ['product' => $product->id])}}" class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <button type="button" wire:click="$dispatch('showAlert', {{$product->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="px-6 py-2 mt-auto">
                            @livewire('cart.add-to-cart', ['productId' => $product->id])
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

    <script>
        document.addEventListener('livewire:initialized', () => {  
            @this.on('showAlert', (productId) => {
                Swal.fire({
                    title: 'Are you sure?',
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
        });
    </script>

    <script>
        document.addEventListener('livewire:initialized', () => {  
            @this.on('showAddToCart', (productId) => {
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
        }); 
    </script> 
@endpush