<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SessionTestController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});

use Stripe\Stripe;
use Stripe\Customer;

Route::get('/stripe-test', function () {
    Stripe::setApiKey(config('services.stripe.secret'));
    try {
        $customer = Customer::create([
            'email' => 'test@example.com',
        ]);
        return 'Stripe connected! Customer ID: ' . $customer->id;
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/check-key', function () {
    return 'Stripe secret: ' . env('STRIPE_SECRET');
});


// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Session Test Route
Route::get('/session-test', [SessionTestController::class, 'index'])->name('session.test');

// Public enquiry routes
Route::get('/enquiry/create', [EnquiryController::class, 'create'])->name('enquiry.create');
Route::post('/enquiry/store', [EnquiryController::class, 'store'])->name('enquiries.store');
Route::get('/enquiries/{id}', [EnquiryController::class, 'show'])->name('enquiries.show');
Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
Route::get('/enquiry/{id}/edit', [EnquiryController::class, 'edit'])->name('enquiries.edit');
Route::delete('/enquiry/{id}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');
Route::put('/enquiry/{id}', [EnquiryController::class, 'update'])->name('enquiries.update');

// Admin routes group
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/enquiries', [AdminController::class, 'index'])->name('admin.enquiries.index');
    Route::get('/admin/enquiry/{id}', [AdminController::class, 'adminShow'])->name('admin.enquiries.show');
    Route::post('/admin/enquiry/{id}/reply', [AdminController::class, 'reply'])->name('admin.enquiries.reply');
    Route::get('/admin/enquiries/search', [AdminController::class, 'search'])->name('admin.enquiries.search');
});
