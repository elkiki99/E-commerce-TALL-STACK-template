<div>
    <x-secondary-button class="mt-5 mr-4" type="button" wire:click="clearingCart">Clear cart
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
    </x-secondary-button>
</div>

@push('scripts')
    <script>
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
    </script>
@endpush