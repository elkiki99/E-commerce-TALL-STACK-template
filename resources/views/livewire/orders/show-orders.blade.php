
<div class="flex flex-col justify-between w-full p-10">
    @if (session()->has('message'))
        <div class="p-2 m-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif

    @if(auth()->user()->admin === 1)
        <div class="flex justify-between w-full mb-5 md:justify-normal md:w-auto md:ml-auto">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live="searchOrders" type="text" id="simple-search"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                        placeholder="Search orders..." required="">
                </div>
            </form>
            <div class="ml-4">
                <select wire:model.live="searchDate" class=" dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600 py-2.5 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 hover:cursor-pointer focus:outline-none focus:ring-0 focus:border-gray-200"> 
                    <option value="">Select date</option>
                    @foreach($dates as $date)
                        <option value="{{ $date }}">{{ $date }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    
    @if (!$payments->isEmpty())
        @foreach ($payments as $index => $order)
            <div class="p-4 m-0.5 rounded flex w-full {{ $index % 2 == 1 ? 'bg-white text-black dark:bg-gray-800 dark:text-white' : 'bg-gray-800 text-white dark:bg-gray-300 dark:text-gray-900' }}">
                <div class="flex justify-between w-full">
                    @if(auth()->user()->admin === 1)
                        <p class="hidden sm:table-cell">{{ $order->user_email }}</p>
                        <p class="hidden sm:table-cell">-</p>
                        <p>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</p>
                        <p>-</p>
                        <span class="flex">${{ $order->amount }}<p class="hidden sm:mx-1 sm:table-cell">{{ $order->currency }}</p></span>
                        <p class="hidden xl:table-cell">-</p>
                        <p class="hidden xl:table-cell">{{ $order->created_at }}</p>
                    @else
                        <span class="flex">${{ $order->amount }}<p class="hidden sm:mx-1 sm:table-cell">{{ $order->currency }}</p></span>
                        <p>-</p>
                        <p>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</p>
                        <p class="hidden sm:table-cell">-</p>
                        <p class="hidden sm:table-cell">{{ $order->created_at }}</p>
                    @endif
                    
                    <div class="flex">
                        <button 
                            class="mx-1" 
                            type="button" 
                            x-on:click.prevent="$dispatch('open-modal', 'complete-order-{{ $order->id }}')"
                        >
                            @if(auth()->user()->admin === 1)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            @endif
                        </button>

                        <x-modal name="complete-order-{{ $order->id }}" :show="$errors->isNotEmpty()" focusable>
                            <form wire:submit="completeOrder({{ $order->id }})" class="p-6">
                    
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Order completed?') }}
                                </h2>
                    
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('If the order was delivered successfully, complete order!') }}
                                </p>
                    
                                <div class="flex justify-end mt-6">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                    
                                    <x-primary-button class="bg-green-500 rounded-md ms-3 hover:bg-green-400 active:bg-green-600 md:w-auto focus:bg-green-600 focus:ring-green-500">
                                        {{ __('Complete order') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                        
                        <a wire:navigate href="{{ route('orders.show', ['payment' => $order->payment_id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        
        <div class="justify-end w-full px-5 py-5">
            {{ $payments->links() }}
        </div>
    @else
        @if (auth()->user()->admin === 1)
            <p class="p-5 my-5 text-gray-500">No active orders</p>
        @else
            <a wire:navigate href="{{ route('home') }}" class="my-5 text-gray-500">No orders found!<span class="text-violet-500"> Go shopping!</span></a>
        @endif
    @endif
</div>