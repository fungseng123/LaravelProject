@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('products.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ $search ?? '' }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                    @if($search)
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card product-card shadow-sm h-100">
                <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                        <p class="card-text text-muted">Starting from ${{ $product->variants->min('price') }}</p>
                    </div>
                </a>
                <div class="card-footer bg-transparent border-0 text-center">
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <select name="variant_id" class="form-select mb-3" required>
                            @foreach($product->variants as $variant)
                                <option value="{{ $variant->id }}">{{ $variant->storage }} - ${{ $variant->price }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            @if($search)
                <p>No products found matching "{{ $search }}".</p>
            @else
                <p>No products available.</p>
            @endif
        </div>
        @endforelse
    </div>
</div>
@endsection