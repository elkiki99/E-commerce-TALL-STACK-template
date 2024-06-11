    <?php

    use App\Livewire\Actions\Logout;
    use Livewire\Volt\Component;
    use App\Models\Category; 

    new class extends Component
    {
        /**
         * Log the current user out of the application.
         */
        
        public function logout(Logout $logout): void
        {
            $logout();
            $this->redirect('/', navigate: true);
        }
    }; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center shrink-0">
                    <!-- Logo -->
                    <div class="flex items-center shrink-0">
                        <a href="{{ route('home') }}" wire:navigate>
                            <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                        </a>
                    </div>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <div class="flex items-center justify-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                    {{ __('Categories') }}

                                    <div class="">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @foreach (App\Models\Category::orderBy('category', 'desc')->get() as $category)
                                <x-dropdown-link 
                                    wire:navigate
                                    class="z-50"
                                    href="{{route('categories.show', ['category' => $category->id])}}">{{
                                    $category->category }}
                                </x-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('About') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('FAQ') }}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @auth
                        <x-dropdown align="right" width="48 ">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                        x-on:profile-updated.window="name = $event.detail.name"></div>

                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @if(auth()->user()->admin === 1)
                                    <div class="block lg:hidden ">
                                        <x-dropdown-link :href="route('profile')" wire:navigate>
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('dashboard')" wire:navigate>
                                            {{ __('Dashboard') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('orders.index')" wire:navigate>
                                            {{ __('Manage orders') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('products.create')" wire:navigate>
                                            {{ __('Create new product') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('products.index')" wire:navigate>
                                            {{ __('Edit products') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('categories.create')" wire:navigate>
                                            {{ __('Create new category') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('categories.index')" wire:navigate>
                                            {{ __('Edit categories') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('tags.create')" wire:navigate>
                                            {{ __('Create new tag') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('tags.index')" wire:navigate>
                                            {{ __('Edit tags') }}
                                        </x-dropdown-link>
                                    </div>
                                    
                                    <x-dropdown-link :href="route('dashboard')" wire:navigate>
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                    <button wire:click="logout" class="w-full text-start">
                                        <x-dropdown-link>
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </button>
                                @else
                                    <x-dropdown-link :href="route('profile')" wire:navigate>
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    
                                    <div class="block lg:hidden">
                                        <x-dropdown-link :href="route('orders.index')" wire:navigate>
                                            {{ __('My orders') }}
                                        </x-dropdown-link>
                                    </div>
                                    
                                    <!-- Authentication -->
                                    <button wire:click="logout" class="w-full text-start">
                                        <x-dropdown-link>
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </button>
                                @endif
                            </x-slot>
                        </x-dropdown>
                    @endauth

                    @guest
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                                {{ __('Login') }}
                            </x-nav-link>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')" wire:navigate>
                                {{ __('Register') }}
                            </x-nav-link>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')" wire:navigate>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </x-nav-link>
                        </div>
                    @endguest

                    @auth
                        @if(auth()->user()->admin === 1)
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 ml-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                </svg>
                            </x-nav-link>
                        @else
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                </x-nav-link>
                            </div>
                        @endif
                    @endauth
                </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden max-h-screen overflow-y-auto sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @guest
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')" wire:navigate>
                        <div class="flex">
                            <p>My cart</p>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 ml-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                    </x-responsive-nav-link>
                </div>
                
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                </div>

                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')" wire:navigate>
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endguest
            
            @auth
                <div class="pt-2 space-y-1 ">
                    @if(auth()->user()->admin === 1)
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('profile')" wire:navigate>
                            <div class="flex">
                                <p>Dashboard</p>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 ml-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                </svg>
                            </div>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')" wire:navigate>
                            {{ __('Manage orders') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                            {{ __('Create new product') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')" wire:navigate>
                            {{ __('Edit products') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('categories.create')" :active="request()->routeIs('categories.create')" wire:navigate>
                            {{ __('Create new category') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" wire:navigate>
                            {{ __('Edit categories') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('tags.create')" :active="request()->routeIs('tags.create')" wire:navigate>
                            {{ __('Create new tag') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.index')" wire:navigate>
                            {{ __('Edit tags') }}
                        </x-responsive-nav-link>
                    @else
                        <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')" wire:navigate>
                            <div class="flex">
                                <p>My cart</p>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 ml-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </div>
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')" wire:navigate>
                            {{ __('My orders') }}
                        </x-responsive-nav-link>
                        <button wire:click="logout" class="w-full text-start">
                            <x-responsive-nav-link>
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </button>
                    @endif
                </div>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @foreach (App\Models\Category::orderBy('category', 'desc')->get() as $category)
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link wire:navigate href="{{route('categories.show', ['category' => $category->id])}}">
                    {{ $category->category }}
                </x-responsive-nav-link>
            </div>
            @endforeach
        </div>
    </div>
</nav>