<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Success!') }}
        </h2>
    </x-slot>

    <div class="w-full pb-10 mx-auto mt-16 lg:w-10/12 md:px-10">
        <div class="w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="mt-10 text-2xl font-bold text-center dark:text-gray-100">Your payment was successful</h1>

            <livewire:payment.success :sessionId="$sessionId" />

            @if($payment->payment_id)
                <p class="px-10 pb-5 dark:text-gray-300">You will be redirected to your order details in a few seconds... 
                    <i class="dark:text-gray-300 fas fa-spinner fa-spin"></i>
                </p>
            @endif
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