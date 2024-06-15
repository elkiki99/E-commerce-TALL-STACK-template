<div class="mt-10">
    @if(count($products) > 0)
        <table class="w-full">
            <x-table-cart :products="$products" :grandTotal="$grandTotal" />
        </table>
    @else
        <a wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
    @endif
</div>