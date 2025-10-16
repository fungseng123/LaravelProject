<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Insert product data
        $product1 = Product::create([
            'name' => 'iPhone 15 Pro',
            'image' => '15pro.webp',
            'description' => 'The latest iPhone with advanced features.',
        ]);

        // Insert variants for the product
        $product1->variants()->createMany([
            [
                'storage' => '128GB',
                'price' => 999.99
            ],
            [
                'storage' => '256GB',
                'price' => 1099.99
            ],
            [
                'storage' => '512GB',
                'price' => 1199.99
            ],
        ]);

        $product2 = Product::create([
            'name' => 'Samsung Galaxy S24',
            'image' => 'glxys24.webp',
            'description' => 'The latest Samsung Galaxy with cutting-edge technology and sleek design.',
        ]);

        $product2->variants()->createMany([
            [
            'storage' => '128GB',
            'price' => 899.99
            ],
            [
            'storage' => '256GB',
            'price' => 999.99
            ],
            [
            'storage' => '512GB',
            'price' => 1099.99
            ],
        ]);

        $product3 = Product::create([
            'name' => 'Google Pixel 8 Pro',
            'image' => 'pixel8pro.jpg',
            'description' => 'Google\'s flagship phone with AI-powered features and exceptional camera quality.',
        ]);

        $product3->variants()->createMany([
            [
            'storage' => '128GB',
            'price' => 899.99
            ],
            [
            'storage' => '256GB',
            'price' => 999.99
            ],
            [
            'storage' => '512GB',
            'price' => 1099.99
            ],
        ]);

        $product4 = Product::create([
            'name' => 'iPhone 14',
            'image' => 'iphone14.jpg',
            'description' => 'Powerful A15 Bionic chip, amazing camera system, and all-day battery life.',
        ]);

        $product4->variants()->createMany([
            [
                'storage' => '128GB',
                'price' => 799.99
            ],
            [
                'storage' => '256GB',
                'price' => 899.99
            ],
            [
                'storage' => '512GB',
                'price' => 999.99
            ],
        ]);

        $product5 = Product::create([
            'name' => 'iPhone 15 Pro Max',
            'image' => 'iphone15promax.jpg',
            'description' => 'The most powerful iPhone ever with A17 Pro chip and revolutionary camera system.',
        ]);

        $product5->variants()->createMany([
            [
                'storage' => '256GB',
                'price' => 1199.99
            ],
            [
                'storage' => '512GB',
                'price' => 1399.99
            ],
            [
                'storage' => '1TB',
                'price' => 1599.99
            ],
        ]);

        $product6 = Product::create([
            'name' => 'Samsung Galaxy S23',
            'image' => 'galaxy-s23.jpg',
            'description' => 'Feature-packed Android phone with exceptional camera capabilities.',
        ]);

        $product6->variants()->createMany([
            [
                'storage' => '128GB',
                'price' => 799.99
            ],
            [
                'storage' => '256GB',
                'price' => 859.99
            ],
            [
                'storage' => '512GB',
                'price' => 959.99
            ],
        ]);

        $product7 = Product::create([
            'name' => 'Samsung Galaxy S24 Ultra',
            'image' => 'galaxy-s24U.jpg',
            'description' => 'Ultimate Android flagship with S Pen and advanced AI features.',
        ]);

        $product7->variants()->createMany([
            [
                'storage' => '256GB',
                'price' => 1299.99
            ],
            [
                'storage' => '512GB',
                'price' => 1419.99
            ],
            [
                'storage' => '1TB',
                'price' => 1619.99
            ],
        ]);
    }
}
