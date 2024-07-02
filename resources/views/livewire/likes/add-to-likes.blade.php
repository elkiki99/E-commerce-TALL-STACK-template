<div
  x-data="{ showModal: false }"
  @keydown.escape="showModal = false"
  x-init="@this.on('triggerModal', () => { showModal = true; setTimeout(() => { showModal = false }, 2000) })"
>
    <!-- Trigger for Modal -->
    <button 
        type="button"
        wire:click="addToLikes"
        @click="showModal = true"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="absolute z-10 w-6 h-6 ml-auto mr-2 transition-transform duration-200 transform hover:scale-125 right-2 top-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>   
    </button>

    <!-- Modal -->
    <div
        class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal"
        x-transition:enter="motion-safe:ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="motion-safe:ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <!-- Modal inner -->
        <div
            class="w-full max-w-lg p-6 py-4 m-6 text-left bg-white rounded shadow-lg"
            @click.away="showModal = false"
            x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="motion-safe:ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
        >
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h5 class="mr-3 text-2xl font-bold text-black">Great choice!</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <div class="flex flex-col justify-end flex-1">
                <div class="mt-2">
                    <p>Go check out your <a class="text-violet-500" wire:navigate href="{{ route('likes.index') }}">liked products</a></p>
                </div>
            </div>
        </div>
    </div>
</div>