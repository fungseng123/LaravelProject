<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    protected $cookieName = 'shopping_cart';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getCartFromCookie()
    {
        $cartJson = Cookie::get($this->cookieName);
        return $cartJson ? json_decode($cartJson, true) : [];
    }

    public function checkout()
    {
        $cart = $this->getCartFromCookie();

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name'] . ' (' . $item['storage'] . ')',
                    ],
                    'unit_amount' => $item['price'] * 100, // convert to cents
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        // Clear the cart cookie after payment
        $cookie = cookie($this->cookieName, json_encode([]), 60 * 24 * 7);

        return response()
            ->view('payment.success')
            ->withCookie($cookie);
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
