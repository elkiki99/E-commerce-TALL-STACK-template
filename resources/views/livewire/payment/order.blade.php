<div class="mt-10">
    @if($payment->order_status == 1)
       <p>Yes</p> 
       
       @if($payment)
            <x-primary-button wire:navigate="/order/{{ $payment->paymentId }}">Follow your order</x-primary-button>
        @endif

    @endif
</div>
