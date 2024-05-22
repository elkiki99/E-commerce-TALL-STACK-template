<div>
    <x-primary-button type="button" wire:click="updateCart">Update cart</x-primary-button>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {  
            @this.on('cartUpdatedSuccess', () => {
                Swal.fire({
                    title: '¡Cart updated successfully!',
                    text: 'Your shopping cart was updated.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    footer: '<a href="{{ route("home") }}">Continue shopping</a>',
                    willClose: () => {
                        location.reload();
                    }
                });
            });

            @this.on('cartUpdatedError', () => {
                Swal.fire({
                    title: 'Error',
                    text: 'No changes were made',
                    icon: 'error'
                });
            });

            @this.on('addToCartError', () => {
                Swal.fire({
                    title: 'Error',
                    text: 'Please add a valid amount',
                    icon: 'error'
                });
            });
        }); 
    </script>
@endpush