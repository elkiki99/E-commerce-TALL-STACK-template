<div>
    <x-primary-button type="button" wire:click="updateCart">Update cart</x-primary-button>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('cartUpdatedSuccess', () => {
                const timer = setTimeout(() => {
                    location.reload();
                }, 2500);

                Swal.fire({
                    title: '¡Cart updated successfully!',
                    text: 'Your shopping cart was updated.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    footer: '<a href="{{ route("home") }}">Continue shopping</a>',
                    willClose: () => {
                        clearTimeout(timer);
                        location.reload();
                    }
                });
            });

            Livewire.on('cartUpdatedError', () => {
                Swal.fire({
                    title: 'Error',
                    text: 'No changes were made',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    willClose: () => {
                    }
                });
                setTimeout(() => {
                    Swal.close();
                }, 1500);
            });

            Livewire.on('addToCartError', () => {
                Swal.fire({
                    title: 'Error',
                    text: 'Please add a valid amount',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    willClose: () => {
                    }
                });
                setTimeout(() => {
                    Swal.close();
                }, 1500);
            });
        });
    </script>
@endpush