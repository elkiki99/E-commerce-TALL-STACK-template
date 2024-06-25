<div wire:navigate href="{{route('cart.show')}}">
    @if($itemCount > 0)
        <span class="px-2 py-1 text-xs font-bold text-white bg-red-500 rounded-full dark:text-gray-900 dark:bg-gray-300">
            {{ $itemCount }}
        </span>
    @endif
</div>