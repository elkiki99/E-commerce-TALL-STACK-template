
<div class="hidden p-4 mb-10 min-w-48 lg:block">
    <ul class="mt-4 space-y-2">
        <li>
            <a wire:navigate href="{{ route('cart.show') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('cart') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                My cart
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('orders.index') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('orders') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                My orders
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('profile') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('profile') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                Profile
            </a>
        </li>
    </ul>
</div>