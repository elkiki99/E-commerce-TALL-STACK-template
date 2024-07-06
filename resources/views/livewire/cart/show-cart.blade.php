<div class="flex flex-col p-10 text-gray-900 dark:text-gray-100">
    @if(count($products) > 0)
        <table class="w-full">
            <x-table-cart :products="$products" :grandTotal="$grandTotal" />
        </table>
    @else
    <div class="justify-end w-full px-5 py-5">

        <a class="my-5 text-gray-500" wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
    </div>
    @endif
</div>