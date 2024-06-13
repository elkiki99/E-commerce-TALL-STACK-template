<div class="flex flex-grow mt-2" x-data="{ quantity: 1 }">
    <div class="ml-auto">
        <button type="button" x-on:click="$wire.AddToCart(quantity)" class="flex p-2 bg-blue-600 rounded-md md:w-auto">
            <p class="px-1 text-white">Add</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mx-2 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
        </button>
    </div>
</div>  

@script
    <script>
        document.addEventListener('livewire:initialized', () => {  
            Livewire.on('showAddToCart', (productId) => {
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
@endscript