<div>
    <div class="hidden p-4 mb-10 min-w-64 xl:block">
        <ul class="mt-4 space-y-2">
            <li>
                <a wire:navigate href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('dashboard') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        <span>Dashboard</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('orders') || request()->is('order/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        <span>Manage orders</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('products.create') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('products/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        <span>Create new product</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('products.index') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('products') || request()->is('products/edit/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        <span>Edit products</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.628 2.628 0 0 1 3.714 0l.914.914a2.628 2.628 0 0 1 0 3.714L10.611 20.086a1.5 1.5 0 0 1-.531.351l-4.028 1.342a.75.75 0 0 1-.95-.95l1.342-4.028a1.5 1.5 0 0 1 .351-.531L16.862 4.487z" />
                        </svg>
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('profile') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('profile') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        <span>Profile</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>                      
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <div class="hidden p-4 mb-10 md:block min-w-16 xl:hidden">
        <ul class="mt-4 space-y-2">
            <li>
                <a wire:navigate href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('dashboard') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        {{-- <span>Dashboard</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('orders') || request()->is('order/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        {{-- <span>Manage orders</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                          </svg>
                          
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('products.create') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('products/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        {{-- <span>Create new product</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('products.index') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('products') || request()->is('products/edit/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        {{-- <span>Edit products</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.628 2.628 0 0 1 3.714 0l.914.914a2.628 2.628 0 0 1 0 3.714L10.611 20.086a1.5 1.5 0 0 1-.531.351l-4.028 1.342a.75.75 0 0 1-.95-.95l1.342-4.028a1.5 1.5 0 0 1 .351-.531L16.862 4.487z" />
                        </svg>
                    </div>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('profile') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('profile') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                    <div class="flex items-center justify-between">
                        {{-- <span>Profile</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                          </svg>                      
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>