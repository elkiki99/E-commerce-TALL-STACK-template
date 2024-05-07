<div class="md:flex">
    <div class="md:w-1/2">
        <img src="{{ asset('storage/img/products/' . $product->image_name ) }}" alt="{{ $product->name }}" class="w-full h-full mb-4 lazyload">
    </div>
    <div class="flex flex-col justify-between p-4 md:w-1/2">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h2>
            <p class="mt-2 text-4xl font-bold text-lime-500">${{ $product->price }}</p>
            <p class="mt-2 text-gray-700">{{ $product->description }}</p>
            <div class="flex flex-wrap my-2">
                @foreach ($tags as $tag)
                    <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $tag->tag }}</span>
                @endforeach
            </div>
        </div>
        
        @guest
            <livewire:counter />
            <div class="mt-auto">
                <x-primary-button class="w-full md:w-auto">Add to cart</x-primary-button>
            </div>
        @endguest
        
        @auth
            @if(auth()->user()->admin === 1)
                <div class="my-2 mt-auto">
                    <div class="flex flex-row mt-5">
                        <a wire:navigate href="{{route('products.edit', ['product' => $product->id])}}" class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </a>    
                        <button type="button" wire:click="$dispatch('showAlert', {{$product->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>       
                        </button>
                    </div>
                </div>
            @else
                <livewire:counter />
                <div class="mt-auto">
                    <x-primary-button class="w-full md:w-auto">Add to cart</x-primary-button>
                </div>
            @endif
        @endauth
    </div>
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
                        setTimeout(() => {
                            @this.call('deleteProduct', productId);
                        }, 3000);
                    }
                })
            });
        });
    </script>
@endpush