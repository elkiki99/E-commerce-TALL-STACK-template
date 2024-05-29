<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PayPalController extends Controller
{   
    public $items = [];
    public $cart;
    public $grandTotal = 0;

    public function index()
    {
        return view('payment.index', [
            'items' => $this->items,
            'grandTotal' => $this->grandTotal,
        ]);
    }

    public function mount($cart)
    {
        $this->cart = $cart ?? session()->get('cart', []);
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $this->items = [];
        $this->grandTotal = 0;
        
        if (auth()->check()) {
            $cart = $this->cart;
            
            if(!empty($cart) && isset($cart->items)) {
                foreach ($this->cart->items as $item) {
                    $this->items[] = [
                        'product' => $item->product,
                        'quantity' => $item->quantity,
                    ];
                    $this->grandTotal += $item->product->price * $item->quantity;
                }
            }
        } else {
            foreach ($this->cart as $productId => $details) {
                $product = Product::find($productId);
    
                if ($product) {
                    $this->items[] = [
                        'product' => $product,
                        'quantity' => $details['quantity'],
                    ];

                    $this->grandTotal += $product->price * $details['quantity'];
                }
            }
        }
    }





    private function getAccessToken()
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode(config('paypal.client_id') . ':' . config('paypal.client_secret'))
        ];

        $response = Http::withHeaders()
            ->withBody('grant_type=client_credentials')
            ->post(config('paypal.base_url') . '/v1/oauth2/token');
        
        return json_decode($response->body())->access_token;
    }
     
    public function create(Request $request)
    {
        // $amount = 0; 
        
        $id = uuid_create();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
            'PayPal-Request-Id' => $id,
        ];

        $body = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => $id,
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($amount, 2),
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders($headers)
            ->withBody(json_encode($body))
            ->post(config('paypal.base_url'). '/v2/checkout/orders');

        Session::put('request_id', $id);
        Session::put('order_id', json_decode($response->body())->id);
        
        return json_decode($response->body())->id; 
    }

    public function complete(Request $request)
    {
        $url = config('paypal.base_url') . '/v2/checkout/orders' . Session::get('order_id') . '/capture';

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ];

        $response = Http::withHeaders($headers)
            ->post($url, null);

        return json_decode($response->body());
    }


    // public function createOrder(Request $request)
    // {
    //     $amount = $request->input('amount');

    //     if (empty($amount)) {
    //         return response()->json(['error' => 'Amount is required'], 400);
    //     }

    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $provider->getAccessToken();

    //     $order = $provider->createOrder([
    //         "intent" => "CAPTURE",
    //         "purchase_units" => [
    //             [
    //                 "amount" => [
    //                     "currency_code" => "USD",
    //                     "value" => $amount
    //                 ]
    //             ]
    //         ]
    //     ]);

    //     return response()->json($order);
    // }

    // public function captureOrder(Request $request)
    // {
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $provider->getAccessToken();

    //     $result = $provider->capturePaymentOrder($request->input('orderID'));

    //     return response()->json($result);
    // }
}   




