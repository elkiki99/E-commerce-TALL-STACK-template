<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Success!') }}
        </h2>
    </x-slot>

    <div class="mb-10 md:p-10 xl:mx-24 md:mb-0">
        <div class="sm:px-5"> 
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="my-5 text-2xl font-bold text-center sm:my-0 sm:mt-5">Your payment was successful</h1>

                    <livewire:payment.success :sessionId="$sessionId" />

                    @if($payment->payment_id)
                        <p>You will be redirected to your order details in a few seconds... 
                            <i class="fas fa-spinner fa-spin"></i>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($payment->payment_id)
        <script>
            setTimeout(function() {
                window.location.href = "/order/{{ $payment->payment_id }}";
            }, 2000);
        </script>
    @endif
</x-app-layout>