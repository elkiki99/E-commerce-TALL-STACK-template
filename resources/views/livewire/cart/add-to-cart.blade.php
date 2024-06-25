<div class="flex items-center flex-grow pl-1 mt-2" x-data="{ quantity: 1 }">
    <div class="w-full"> 
        <x-primary-button type="button" x-on:click="$wire.addToCart(quantity)" class="flex items-center justify-center w-full capitalize rounded-full">
            <p class="text-lg">Add</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 ml-2 dark:text-gray-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
        </x-primary-button>   
    </div>
</div>

@script   
    <script>
        Livewire.on('cartUpdated', () => {
            Swal.fire({
                title: 'Product added successfully!',
                text: 'Your product was added to your shopping cart.',
                icon: 'success',
                confirmButtonText: 'OK',
                footer: '<a href="{{ route("cart.show") }}">Go to cart</a>',
            });
            setTimeout(() => {
                Swal.close();
            }, 2500);
        });
    </script>
@endscript