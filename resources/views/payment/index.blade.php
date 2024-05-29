
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('My cart') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                      <h1 class="my-5 text-2xl font-bold text-center">Complete your purchase</h1>
  
                      <div class="mt-5 row">
                        <div class="col-12 col-lg-6 offset-lg-3 alert alert-success" role="alert" id="paypal-success" style="display: none;">
                              You have successfully completed your purchase!
                        </div>
  
                          <div class="justify-center col-12 col-lg-6 offset-lg-3">
                                @foreach ($items as $item)
                                    <tr class="border-t-2">
                                        <td class="py-2"><img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-16 h-16"></td>
                                        <td class="py-2">{{ $item['product']->name }}</td>
                                        <td class="py-2">{{ $item['product']->price }}</td>
                                        <td class="py-2"><livewire:cart.counter :productId="$item['product']->id" /></td>
                                        <td class="py-2">{{ $item['product']->price * $item['quantity']  }}</td>
                                        <td class="py-2"><livewire:cart.delete-cart-product :productId="$item['product']->id" /></td>
                                    </tr>
                                @endforeach
                            
                            <div class="my-10 col-12 col-lg-6 offset-lg-3" id="payment_options"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    @push('scripts')
      <script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.' . config('paypal.mode') . '.client_id') }}&currency=GBP&intent=capture"></script>
      <script>
  
          paypal.Buttons({
              createOrder: function(data, actions) {
                  const amount = document.getElementById("paypal-amount").value;
  
                  if (!amount) {
                      alert("Please enter an amount");
                      throw new Error("Amount is required");
                  }
  
                  return fetch('/create-order', {
                      method: 'post',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                      body: JSON.stringify({ amount: amount })
                  }).then(response => response.json())
                  .then(order => order.id);
              },
              onApprove: function(data, actions) {
                  return fetch('/capture-order', {
                      method: 'post',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                      body: JSON.stringify({ orderID: data.orderID })
                  }).then(response => response.json())
                  .then(details => {
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
  </x-app-layout>