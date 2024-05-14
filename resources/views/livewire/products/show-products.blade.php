<div class="flex flex-wrap justify-between p-10">
    @foreach ($products as $product)
        <div wire:key="{{ $product->id }}" class="flex flex-col w-full p-2 mb-4 md:w-1/2 lg:w-1/3 xl:w-1/4">
            <div class="flex flex-col h-full overflow-hidden bg-white rounded-lg md:shadow-md">
                <div class="flex flex-col h-full p-6">
                    <div class="flex items-center justify-center">
                        <a wire:navigate href="{{route('products.show', ['product' => $product->id])}}">
                            <img class="object-contain w-full h-48" loading="lazy" src="{{ asset('storage/img/products/' . $product->image ) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="flex flex-col flex-grow">
                        <p class="mt-2 text-2xl font-bold text-green-500">${{ $product->price }}</p>
                        <a wire:navigate href="{{route('products.show', ['product' => $product->id])}}">
                            <h2 class="mt-2 text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
                        </a>
                    </div>

                    <div class="mt-2">
                        @guest
                            <div class="flex flex-row">
                                <livewire:counter />
                                <x-primary-button class="w-full ml-auto md:w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                </x-primary-button>
                            </div>
                        @endguest

                        @auth
                            @if(auth()->user()->admin === 1)
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
                            @else
                                <div class="flex flex-row">
                                    <livewire:counter />
                                    <button class="ml-auto md:w-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="justify-end w-full px-5 py-10">
        {{ $products->links() }}
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
                        window.setTimeout(() => {
                            @this.call('deleteProduct', productId);
                        }, 1500);
                    }
                })
            });
        });
    </script>
@endpush