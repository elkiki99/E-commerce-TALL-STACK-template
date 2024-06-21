<div class="my-5 sm:mb-0 sm:p-10">
    @if(count($products) > 0)
        <table class="w-full">
            <x-table-cart :products="$products" />
        </table>
    @else
        <a class="mb-5 dark:text-gray-400" wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
    @endif
</div>