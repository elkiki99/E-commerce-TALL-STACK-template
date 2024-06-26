
<div class="hidden p-4 mb-10 min-w-48 lg:block">
    <ul class="mt-4 space-y-2">
        <li>
            <a wire:navigate href="{{ route('cart.show') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ (request()->is('cart') || request()->is('checkout')) ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                My cart
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm font-medium  rounded-md {{ (request()->is('orders') || request()->is('order/*')) ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                My orders
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('likes.index') }}" class="block px-4 py-2 text-sm font-medium  rounded-md {{ request()->is('likes') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                My likes
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('profile') }}" class="block px-4 py-2 text-sm font-medium  rounded-md {{ request()->is('profile') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Profile
            </a>
        </li>
    </ul>
</div>