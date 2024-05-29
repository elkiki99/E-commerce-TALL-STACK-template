<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class PayPalController extends Controller
{   
    public function show(Cart $cart)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        } else {
            $cart = session()->get('cart', []);
        }

        return view('payment.show', [
            'cart' => $cart
        ]);
    }

    private function getAccessToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode(config('paypal.client_id') . ':' . config('paypal.client_secret'))
        ])->post(config('paypal.base_url') . '/v1/oauth2/token');

        return json_decode($response->body())->access_token;
    }
     
    public function create()
    {
        $id = uuid_create();
        $amount = 0;
    
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
    
    public function complete()
    {
        $url = config('paypal.base_url') . '/v2/checkout/orders/' . Session::get('order_id') . '/capture';
    
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




