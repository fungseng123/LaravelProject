<!DOCTYPE html>
<html lang="en">

<style>
    /* Prevent scrollbar layout shift */
    html {
        overflow-y: scroll;
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        font-family: 'Segoe UI', sans-serif;
        background-color: #f8f9fa;
        color: #212529;
    }

    /* Header */
    header {
        background-color: #0d6efd;
    }

    header nav a {
        transition: color 0.3s;
    }

    header nav a:hover {
        color: #ffc107;
    }

    /* Carousel */
    .carousel-item img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }

    /* Section Title */
    section h2 {
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 30px;
    }

    /* Product Cards */
    .product-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        height: 100%;
    }

    .product-card img.product-image {
        width: 100%;
        height: 300px;
        object-fit: contain;
        padding: 20px;
        background-color: #fff;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .product-card .card-body {
        padding: 20px;
        text-align: center;
        background-color: #fff;
    }

    .product-card .card-footer {
        padding: 20px;
        background-color: #fff;
    }

    .product-card .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .product-card .card-text {
        font-size: 1rem;
        color: #555;
    }

    .product-card .btn {
        border-radius: 25px;
        padding: 8px 20px;
    }

    /* Footer */
    footer {
        background-color: #343a40;
        color: #fff;
        padding: 30px 0;
        text-align: center;
        margin-top: 60px;
    }

    footer p {
        margin: 0;
    }

    /* Main content wrapper */
    main {
        flex: 1;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .carousel-item img {
            height: 300px;
        }

        .product-card img {
            height: 200px;
        }
    }

    /* Toast styling */
    .toast-container {
        position: fixed;
        top: 50px;
        right: 20px;
        z-index: 1050;
    }

    .toast {
        background-color: white;
        min-width: 250px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobileZone - @yield('title')</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        .product-card img {
            height: 250px;
            object-fit: cover;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 m-0">📱 MobileZone</h1>
            <nav class="d-flex align-items-center">
                <a href="{{ url('/') }}" class="text-white me-3 text-decoration-none">Home</a>
                <a href="{{ route('products.index') }}" class="text-white me-3 text-decoration-none">Shop</a>
                <a href="{{ route('enquiry.create') }}" class="text-white me-3 text-decoration-none">Contact</a>
                <a href="{{ route('cart.index') }}" class="text-white me-3 text-decoration-none position-relative">
                    🛒 Cart
                    @if($cartCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                @can('isAdmin')
                    <a href="{{ route('admin.enquiries.index') }}" class="text-white me-3 text-decoration-none">Admin</a>
                @endcan

                @guest
                    <a href="{{ route('login') }}"
                        class="text-white me-3 text-decoration-none">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-white text-decoration-none">Register</a>
                    @endif
                @else
                    <div class="dropdown">
                        <a class="text-white text-decoration-none dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Toast Container -->
    <div class="toast-container">
        @if (session('success'))
            <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 bg-dark text-white mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} MobileZone. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Initialize Toasts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 3000
                });
            });
            toastList.forEach(toast => toast.show());
        });
    </script>
</body>

</html>
