<div wire:navigate href="{{route('likes.index')}}" class="relative top-0 left-0 transform -translate-x-1/4 -translate-y-1/4">
    @if($likesCount > 0)
        <span class="px-2 py-1 text-xs font-bold text-white bg-red-500 rounded-full dark:text-gray-900 dark:bg-gray-300">
            {{ $likesCount }}
        </span>
    @endif
</div>