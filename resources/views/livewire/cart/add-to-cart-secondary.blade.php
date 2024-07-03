<div 
    class="flex items-center flex-grow pl-1 mt-2"
    x-data="{ modelOpen: false }"
    x-init="Livewire.on('closeModal', () => { modelOpen = false; });
    "
>
    <div class="ml-auto" x-data="{ quantity: 1 }" >
        <x-secondary-button 
            type="button" 
            @click="modelOpen =!modelOpen"
            x-on:click="$wire.addToCart(quantity)"  
            class="flex items-center justify-center rounded-md md:w-auto"
        >
            <p>Add</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 dark:text-gray-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
        </x-secondary-button>  
        
        <div x-show="modelOpen" 
            x-transition 
            class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto" 
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true">
           <div class="flex items-center justify-center min-h-screen px-4 text-center">
               <div x-cloak 
                   @click="modelOpen = false" 
                   x-show="modelOpen"
                   x-transition:enter="transition ease-out duration-300 transform"
                   x-transition:enter-start="opacity-0" 
                   x-transition:enter-end="opacity-100"
                   x-transition:leave="transition ease-in duration-200 transform"
                   x-transition:leave-start="opacity-100" 
                   x-transition:leave-end="opacity-0"
                   
                   class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" 
                   aria-hidden="true">
               </div>

               <div x-cloak 
                   x-show="modelOpen"
                   x-transition:enter="transition ease-out duration-300 transform"
                   x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                   x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                   x-transition:leave="transition ease-in duration-200 transform"
                   x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                   x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                   
                   class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                   <div class="flex items-center justify-between space-x-4">
                       <h1 class="text-xl font-medium text-gray-800">Product added successfully!</h1>

                       <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                           </svg>
                       </button>
                   </div>

                   <p class="mt-2 text-sm text-gray-500">
                       Your product was added to your shopping cart.
                   </p>

                   <div class="mt-4">
                       <a href="{{ route('cart.show') }}" class="text-violet-500">Go to cart</a>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>