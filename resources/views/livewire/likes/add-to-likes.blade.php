<div 
    x-data="{ modelOpen: false, liked: @json($isLiked) }"
    x-init="Livewire.on('closeModal', () => { modelOpen = false; });"
>
    <button 
        @click="if (liked) { $wire.removeFromLikes().then(() => { liked = false; }); } else { modelOpen = true; $wire.addToLikes().then(() => { liked = true; }); }"
    >
        <svg xmlns="http://www.w3.org/2000/svg" 
             :class="!liked ? 'fill-none' : 'fill-current text-red-600'" 
             viewBox="0 0 24 24" 
             stroke-width="1" 
             stroke="currentColor" 
             class="absolute z-10 w-10 h-10 ml-auto mr-2 transition-transform duration-200 transform hover:scale-125 right-2 top-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>
    </button>

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
                    <h1 class="text-xl font-medium text-gray-800">Great choice!</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <p class="mt-2 text-sm text-gray-500">
                    Your product was successfully added to your likes.
                </p>

                <div class="mt-4">
                    <a href="{{ route('likes.index') }}" class="text-violet-500">View liked products</a>
                </div>
            </div>
        </div>
    </div>
</div>