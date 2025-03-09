<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $keywords = [
            [
                'content' => 'Free shipping',
                'created_at' => now(),
            ],
            [
                'content' => 'Best price',
                'created_at' => now(),
            ],
            [
                'content' => 'Discounts',
                'created_at' => now(),
            ],
            [
                'content' => 'Sale',
                'created_at' => now(),
            ],
            [
                'content' => 'Clearance',
                'created_at' => now(),
            ],
            [
                'content' => 'Buy online',
                'created_at' => now(),
            ],
            [
                'content' => 'Shop now',
                'created_at' => now(),
            ],
            [
                'content' => 'Limited time offer',
                'created_at' => now(),
            ],
            [
                'content' => 'Best deals',
                'created_at' => now(),
            ],
            [
                'content' => 'Affordable',
                'created_at' => now(),
            ],
            [
                'content' => 'Top-rated',
                'created_at' => now(),
            ],
            [
                'content' => 'Customer reviews',
                'created_at' => now(),
            ],
            [
                'content' => 'Fast delivery',
                'created_at' => now(),
            ],
            [
                'content' => 'Secure checkout',
                'created_at' => now(),
            ],
            [
                'content' => 'Money-back guarantee',
                'created_at' => now(),
            ],
            [
                'content' => 'New arrivals',
                'created_at' => now(),
            ],
            [
                'content' => 'Trending products',
                'created_at' => now(),
            ],
            [
                'content' => 'Best sellers',
                'created_at' => now(),
            ],
            [
                'content' => 'Gift ideas',
                'created_at' => now(),
            ],
            [
                'content' => 'Seasonal sale',
                'created_at' => now(),
            ],
            [
                'content' => 'Smartphone',
                'created_at' => now(),
            ],
            [
                'content' => 'Laptop',
                'created_at' => now(),
            ],
            [
                'content' => 'Headphones',
                'created_at' => now(),
            ],
            [
                'content' => 'Wireless earbuds',
                'created_at' => now(),
            ],
            [
                'content' => 'Smartwatch',
                'created_at' => now(),
            ],
            [
                'content' => '4K TV',
                'created_at' => now(),
            ],
            [
                'content' => 'Gaming console',
                'created_at' => now(),
            ],
            [
                'content' => 'Bluetooth speaker',
                'created_at' => now(),
            ],
            [
                'content' => 'Home theater',
                'created_at' => now(),
            ],
            [
                'content' => 'Camera',
                'created_at' => now(),
            ],
            [
                'content' => 'Drone',
                'created_at' => now(),
            ],
            [
                'content' => 'Charger',
                'created_at' => now(),
            ],
            [
                'content' => 'Power bank',
                'created_at' => now(),
            ],
            [
                'content' => 'Tablet',
                'created_at' => now(),
            ],
            [
                'content' => 'Printer',
                'created_at' => now(),
            ],
            [
                'content' => 'Monitor',
                'created_at' => now(),
            ],
            [
                'content' => 'Keyboard',
                'created_at' => now(),
            ],
            [
                'content' => 'Mouse',
                'created_at' => now(),
            ],
            [
                'content' => 'SSD',
                'created_at' => now(),
            ],
            [
                'content' => 'Router',
                'created_at' => now(),
            ],
            [
                'content' => 'Men\'s clothing',
                'created_at' => now(),
            ],
            [
                'content' => 'Women\'s clothing',
                'created_at' => now(),
            ],
            [
                'content' => 'Kids\' clothing',
                'created_at' => now(),
            ],
            [
                'content' => 'Summer dress',
                'created_at' => now(),
            ],
            [
                'content' => 'Winter jacket',
                'created_at' => now(),
            ],
            [
                'content' => 'Sneakers',
                'created_at' => now(),
            ],
            [
                'content' => 'Formal shoes',
                'created_at' => now(),
            ],
            [
                'content' => 'Casual wear',
                'created_at' => now(),
            ],
            [
                'content' => 'Sportswear',
                'created_at' => now(),
            ],
            [
                'content' => 'Activewear',
                'created_at' => now(),
            ],
            [
                'content' => 'Jeans',
                'created_at' => now(),
            ],
            [
                'content' => 'T-shirts',
                'created_at' => now(),
            ],
            [
                'content' => 'Hoodies',
                'created_at' => now(),
            ],
            [
                'content' => 'Handbags',
                'created_at' => now(),
            ],
            [
                'content' => 'Watches',
                'created_at' => now(),
            ],
            [
                'content' => 'Jewelry',
                'created_at' => now(),
            ],
            [
                'content' => 'Sunglasses',
                'created_at' => now(),
            ],
            [
                'content' => 'Underwear',
                'created_at' => now(),
            ],
            [
                'content' => 'Socks',
                'created_at' => now(),
            ],
            [
                'content' => 'Swimwear',
                'created_at' => now(),
            ],
            [
                'content' => 'Furniture',
                'created_at' => now(),
            ],
            [
                'content' => 'Sofa',
                'created_at' => now(),
            ],
            [
                'content' => 'Dining table',
                'created_at' => now(),
            ],
            [
                'content' => 'Bed',
                'created_at' => now(),
            ],
            [
                'content' => 'Mattress',
                'created_at' => now(),
            ],
            [
                'content' => 'Home decor',
                'created_at' => now(),
            ],
            [
                'content' => 'Lighting',
                'created_at' => now(),
            ],
            [
                'content' => 'Cookware',
                'created_at' => now(),
            ],
            [
                'content' => 'Cutlery',
                'created_at' => now(),
            ],
            [
                'content' => 'Blender',
                'created_at' => now(),
            ],
            [
                'content' => 'Microwave',
                'created_at' => now(),
            ],
            [
                'content' => 'Air fryer',
                'created_at' => now(),
            ],
            [
                'content' => 'Coffee maker',
                'created_at' => now(),
            ],
            [
                'content' => 'Vacuum cleaner',
                'created_at' => now(),
            ],
            [
                'content' => 'Washing machine',
                'created_at' => now(),
            ],
            [
                'content' => 'Refrigerator',
                'created_at' => now(),
            ],
            [
                'content' => 'Dishwasher',
                'created_at' => now(),
            ],
            [
                'content' => 'Storage solutions',
                'created_at' => now(),
            ],
            [
                'content' => 'Curtains',
                'created_at' => now(),
            ],
            [
                'content' => 'Rugs',
                'created_at' => now(),
            ],
            [
                'content' => 'Skincare',
                'created_at' => now(),
            ],
            [
                'content' => 'Makeup',
                'created_at' => now(),
            ],
            [
                'content' => 'Haircare',
                'created_at' => now(),
            ],
            [
                'content' => 'Shampoo',
                'created_at' => now(),
            ],
            [
                'content' => 'Conditioner',
                'created_at' => now(),
            ],
            [
                'content' => 'Face mask',
                'created_at' => now(),
            ],
            [
                'content' => 'Moisturizer',
                'created_at' => now(),
            ],
            [
                'content' => 'Lipstick',
                'created_at' => now(),
            ],
            [
                'content' => 'Perfume',
                'created_at' => now(),
            ],
            [
                'content' => 'Deodorant',
                'created_at' => now(),
            ],
            [
                'content' => 'Electric shaver',
                'created_at' => now(),
            ],
            [
                'content' => 'Hair dryer',
                'created_at' => now(),
            ],
            [
                'content' => 'Straightener',
                'created_at' => now(),
            ],
            [
                'content' => 'Nail polish',
                'created_at' => now(),
            ],
            [
                'content' => 'Sunscreen',
                'created_at' => now(),
            ],
            [
                'content' => 'Body lotion',
                'created_at' => now(),
            ],
            [
                'content' => 'Essential oils',
                'created_at' => now(),
            ],
            [
                'content' => 'Beard care',
                'created_at' => now(),
            ],
            [
                'content' => 'Makeup brushes',
                'created_at' => now(),
            ],
            [
                'content' => 'Cosmetic bag',
                'created_at' => now(),
            ],
            [
                'content' => 'Running shoes',
                'created_at' => now(),
            ],
            [
                'content' => 'Gym equipment',
                'created_at' => now(),
            ],
            [
                'content' => 'Camping gear',
                'created_at' => now(),
            ],
            [
                'content' => 'Hiking boots',
                'created_at' => now(),
            ],
            [
                'content' => 'Bicycles',
                'created_at' => now(),
            ],
            [
                'content' => 'Fitness apparel',
                'created_at' => now(),
            ],
            [
                'content' => 'Yoga accessories',
                'created_at' => now(),
            ],
            [
                'content' => 'Tennis racket',
                'created_at' => now(),
            ],
            [
                'content' => 'Football',
                'created_at' => now(),
            ],
            [
                'content' => 'Basketball',
                'created_at' => now(),
            ],
            [
                'content' => 'Golf clubs',
                'created_at' => now(),
            ],
            [
                'content' => 'Fishing gear',
                'created_at' => now(),
            ],
            [
                'content' => 'Backpacks',
                'created_at' => now(),
            ],
            [
                'content' => 'Water bottles',
                'created_at' => now(),
            ],
            [
                'content' => 'Tents',
                'created_at' => now(),
            ],
            [
                'content' => 'Sleeping bags',
                'created_at' => now(),
            ],
            [
                'content' => 'Outdoor clothing',
                'created_at' => now(),
            ],
            [
                'content' => 'Sports nutrition',
                'created_at' => now(),
            ],
            [
                'content' => 'Exercise bike',
                'created_at' => now(),
            ],
            [
                'content' => 'Dumbbells',
                'created_at' => now(),
            ],
        ];
        DB::table('keywords')->insert($keywords);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
