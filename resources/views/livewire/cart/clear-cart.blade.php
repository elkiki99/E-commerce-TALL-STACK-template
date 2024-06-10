<div>
    <x-primary-button class="mt-5" type="button" wire:click="clearingCart">Clear cart</x-primary-button>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('clearingCart', () => {
                Swal.fire({
                    title: "Clear cart?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, clear it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('confirmClearCart');
                    }
                });
            });

            Livewire.on('cartCleared', () => {
                const timer = setTimeout(() => {
                    location.reload();
                }, 1500);

                Swal.fire({
                    title: "¡Cart cleared successfully!",
                    text: "Your shopping cart was cleared.",
                    icon: "success",
                    willClose: () => {
                        clearTimeout(timer);
                        location.reload();
                    }
                });
            });
        });
    </script>
@endpush