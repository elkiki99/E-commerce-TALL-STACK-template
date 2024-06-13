<div class="flex flex-row">
    <x-add-to-cart-counter :productId="$productId" />
</div>

@script    
    <script>
        document.addEventListener('livewire:initialized', () => {  
            Livewire.on('addToCartSuccess', () => {
                Swal.fire({
                    title: '¡Product added successfully!',
                    text: 'Your product was added to your shopping cart.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    footer: '<a href="{{ route("cart.show") }}">Go to cart</a>',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('refreshCartComponent');
                    }
                });

                setTimeout(() => {
                    Swal.close();
                    Livewire.dispatch('refreshCartComponent');
                }, 2500);
            });

            Livewire.on('addToCartError', () => {
                Swal.fire({
                    title: 'Error',
                    text: 'Please add a valid amount',
                    icon: 'error',
                    willClose: () => {
                    }
                });
                setTimeout(() => {
                    Swal.close();
                }, 1500);
            });
        }); 
    </script>
@endscript