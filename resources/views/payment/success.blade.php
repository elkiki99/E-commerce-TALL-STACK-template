<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Success!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="my-5 text-2xl font-bold text-center">Your payment was successful</h1>

                    <livewire:payment.success :sessionId="$sessionId" />

                    @if($payment->payment_id)
                        <p>You will be redirected to your order details in a few seconds... 
                            <i class="fas fa-spinner fa-spin"></i>
                        </p>
                        
                        <x-primary-button class="mt-5" wire:navigate href="/order/{{ $payment->payment_id }}">Follow your order</x-primary-button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($payment->payment_id)
        <script>
            setTimeout(function() {
                window.location.href = "/order/{{ $payment->payment_id }}";
            }, 3000);
        </script>
    @endif
</x-app-layout>