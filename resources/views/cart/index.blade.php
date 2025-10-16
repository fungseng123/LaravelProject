@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Shopping Cart</h2>

    @if (count($cart) > 0)
    <table class="table table-bordered">
        <thead>
            <tr class="align-middle">
                <th class="align-middle">Phone</th>
                <th class="align-middle">Storage</th>
                <th class="align-middle">Price</th>
                <th class="align-middle">Quantity</th>
                <th class="align-middle">Subtotal</th>
                <th class="align-middle">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
            <tr>
                <td class="align-middle">{{ $item['name'] }}</td>
                <td class="align-middle">{{ $item['storage'] }}</td>
                <td class="align-middle">${{ $item['price'] }}</td>
                <td class="align-middle">
                    <form action="{{ route('cart.update') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="variant_id" value="{{ $item['variant_id'] }}">
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control d-inline-block w-auto align-middle">
                        <button type="submit" class="btn btn-sm btn-primary align-middle">Update</button>
                    </form>
                </td>
                <td class="align-middle">${{ $item['price'] * $item['quantity'] }}</td>
                <td class="align-middle">
                    <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="variant_id" value="{{ $item['variant_id'] }}">
                        <button type="submit" class="btn btn-sm btn-danger ">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end align-middle"><strong>Total:</strong></td>
                <td colspan="2" class="align-middle"><strong>${{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="text-end mt-3">
        <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-warning me-2">Clear Cart</button>
        </form>

        {{-- ✅ Added Checkout Button --}}
        @if(!empty($cart))
        <form action="{{ route('payment.checkout') }}" method="GET" class="d-inline">
            <button type="submit" class="btn btn-success">Proceed to Checkout</button>
        </form>
        @endif
    </div>
    @else
    <p>Your cart is empty.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
    @endif
</div>
@endsection
