@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>

            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="variant_id" class="form-label">Select Storage</label>
                    <select name="variant_id" id="variant_id" class="form-select" required>
                        @foreach($product->variants as $variant)
                        <option value="{{ $variant->id }}">
                            {{ $variant->storage }} - ${{ $variant->price }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-2">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection