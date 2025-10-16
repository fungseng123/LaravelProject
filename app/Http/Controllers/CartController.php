<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    protected $cookieName = 'shopping_cart';
    protected $cookieExpiry = 60 * 24 * 7; // 7 days in minutes

    public function index()
    {
        $cart = $this->getCartFromCookie();
        return view('cart.index', ['cart' => $cart]);
    }

    public function add(Request $request)
    {
        Log::info('Add to cart request:', ['request' => $request->all()]);
        
        $variant = ProductVariant::with('product')->findOrFail($request->variant_id);
        if (!$variant->product) {
            Log::error('Product relationship not loaded for variant:', ['variant_id' => $variant->id]);
            return redirect()->back()->with('error', 'Product not found');
        }
        Log::info('Found variant with product:', ['variant' => $variant->toArray()]);
        
        $cart = $this->getCartFromCookie();
        Log::info('Current cart:', ['cart' => $cart]);

        // Check if product is already in cart
        $found = false;
        foreach ($cart as $key => $item) {
            if ($item['variant_id'] == $variant->id) {
                $cart[$key]['quantity'] += 1;
                $found = true;
                break;
            }
        }

        // If product isn't in the cart, add a new item
        if (!$found) {
            $cart[] = [
                'product_id' => $variant->product->id,
                'variant_id' => $variant->id,
                'name' => $variant->product->name,
                'storage' => $variant->storage,
                'price' => $variant->price,
                'quantity' => 1
            ];
        }

        Log::info('Cart after adding item:', ['cart' => $cart]);
        $cookie = $this->createCartCookie($cart);
        Log::info('Created cookie:', ['name' => $cookie->getName(), 'value' => $cookie->getValue()]);

        return redirect()->back()
            ->withCookie($cookie)
            ->with('success', 'Product added to cart!');
    }

    /**
     * Get the cart data from cookie
     */
    protected function getCartFromCookie()
    {
        $cartJson = Cookie::get($this->cookieName);
        if (!$cartJson) {
            return [];
        }

        try {
            return json_decode($cartJson, true) ?? [];
        } catch (\Exception $e) {
            Log::error('Failed to decode cart cookie: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create a new cart cookie
     */
    protected function createCartCookie(array $cart)
    {
        return cookie($this->cookieName, json_encode($cart), $this->cookieExpiry);
    }

    /**
     * Remove all items from cart
     */
    public function clear()
    {
        return redirect()->back()
            ->withCookie($this->createCartCookie([]))
            ->with('success', 'Cart cleared!');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request)
    {
        $cart = $this->getCartFromCookie();
        $variantId = $request->variant_id;
        $quantity = max(1, (int)$request->quantity); // Ensure quantity is at least 1

        foreach ($cart as $key => $item) {
            if ($item['variant_id'] == $variantId) {
                $cart[$key]['quantity'] = $quantity;
                break;
            }
        }

        return redirect()->back()
            ->withCookie($this->createCartCookie($cart))
            ->with('success', 'Cart updated!');
    }

    /**
     * Remove an item from cart
     */
    public function remove(Request $request)
    {
        $cart = $this->getCartFromCookie();
        $variantId = $request->variant_id;

        $cart = array_filter($cart, function($item) use ($variantId) {
            return $item['variant_id'] != $variantId;
        });

        return redirect()->back()
            ->withCookie($this->createCartCookie(array_values($cart)))
            ->with('success', 'Item removed from cart!');
    }
}
