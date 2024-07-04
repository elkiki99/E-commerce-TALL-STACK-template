<div x-data="{ liked: @json($isLiked) }">
    <button 
        type="button"
        @click.prevent="if(liked) { 
            $wire.removeFromLikes().then(() => { liked = false; }); 
        } else { 
            $wire.addToLikes().then(() => { 
                $dispatch('open-modal', 'add-to-likes-{{ $product->id }}');
                liked = true
            }); 
        }"
    >
        <svg xmlns="http://www.w3.org/2000/svg" 
             :class="!liked ? 'fill-none stroke-black' : 'fill-current text-red-500'" 
             viewBox="0 0 24 24" 
             stroke-width="1" 
             stroke="currentColor" 
             class="absolute z-10 w-10 h-10 ml-auto mr-2 transition-transform duration-200 transform hover:scale-125 right-2 top-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>
    </button>

    <x-modal name="add-to-likes-{{ $product->id }}" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Great choice!') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Your product was successfully added to your likes') }}
            </p>

            <div class="flex justify-start mt-6 md:justify-end">
                <a href="{{ route('likes.index') }}" class="text-violet-500">{{ __('Go to liked products') }}</a>
            </div>
        </div>
    </x-modal>
</div>
