
<x-app-layout>        
  <html>
    <head>
        <script src="https://sdk.mercadopago.com/js/v2">
        </script>
    </head>
    <body>
        <div id="wallet_container">
        </div>
        <script>
          const mp = new MercadoPago('YOUR_PUBLIC_KEY', {
            locale: 'pt-BR'
          });

          mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "<PREFERENCE_ID>",
            },
          });
      </script>
    </body>
  </html>
</x-app-layout>        
