@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Carousel -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner2.webp') }}" class="d-block w-100" alt="Smartphones">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100" alt="Discounts">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100" alt="New Arrivals">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Products Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Featured Phones</h2>
            <div class="row g-4">
                @foreach($products as $product)
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
                @endforeach
            </div>
        </div>
    </section>

@endsection
