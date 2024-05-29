<div class="mt-10">
    <div class="col-12 col-lg-6 offset-lg-3 alert alert-success" role="alert" id="paypal-success" style="display: none;">
        You have successfully completed your purchase!
    </div>
    
    @if(($items))
        <div class="justify-center">
            @foreach ($items as $item)
                <div class="flex border-t-2 col-2">
                    <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-32 h-32 m-2"></img>
                    <div class="mt-2">
                        <p class="text-xl font-bold">{{ $item['product']->name }}</p>
                        <p class="text-3xl">${{ $item['product']->price }}</p>
                        <p class="font-normal text-lg">Quantity: <span class="font-bold">{{ $item['quantity'] }}</span></p>
                        <p class="font-normal text-lg">Total: <span class="font-bold">{{ $item['product']->price * $item['quantity']  }}</span></p>
                    </div>
                </div>
            @endforeach

            <h2 class="font-bold text-xl mt-5">Grand total:</h2>
            <p class="text-2xl" id="paypal-amount">${{ number_format($grandTotal, 2) }}</p>
    
            <div class="flex mt-5">
                <div id="payment_options"></div>
            </div>
        </div>
    @else
        <div>
            <p>There's no products yet!
                <a class="text-violet-500" href="{{ route('home') }}"> Go shopping!</a>
            </p>
        </div>
    @endif

</div>

@push('scripts')
    <script>
        paypal.Buttons({
            createOrder: function() {
                const grandTotal = {{ $grandTotal }};
                if (!grandTotal) {
                    alert("Please enter an amount");
                    throw new Error("Amount is required");
                }

                return fetch(`/create/${grandTotal}`)
                    .then((response) => response.text())
                    .then((id) => {
                        return id;
                    });
            },
            
            onApprove: function() {
                return fetch("/complete", {method: "post", headers: {"X-CSRF-Token": '{{csrf_token()}}'}})
                    .then((response) => response.json())
                    .then((order_details) => {
                        document.getElementById("paypal-success").style.display = 'block';
                    });
            },
            onCancel: function(data) {
                console.log('Payment cancelled:', data);
            },
            onError: function(err) {
                console.error('Error:', err);
            }
        }).render('#payment_options');
    </script>
@endpush