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
                    <div class="px-6 py-2 mt-auto">
                        @livewire('cart.add-to-cart', ['productId' => $product->id])
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="justify-end w-full px-5 pt-5">
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
                            'Deleted successfully',
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