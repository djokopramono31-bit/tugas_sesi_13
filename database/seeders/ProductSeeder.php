<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elektronik = Category::where('name', 'Elektronik')->first();
        $buku = Category::where('name', 'Buku')->first();
        $asesoris = Category::where('name', 'Asesoris')->first();

        $products = [
            [
                'category_id' => $elektronik?->id,
                'name' => 'Smartphone Samsung Galaxy A55',
                'description' => 'Smartphone canggih dengan layar Super AMOLED 120Hz dan kamera 50MP OIS.',
                'price' => 5999000,
                'stock' => 25,
                'image' => 'samsung-galaxy-a55.jpg',
            ],
            [
                'category_id' => $buku?->id,
                'name' => 'Buku Panduan Mahir Laravel 13',
                'description' => 'Buku komprehensif menguasai framework Laravel 13 dari dasar hingga membangun aplikasi web modern.',
                'price' => 135000,
                'stock' => 50,
                'image' => 'buku-laravel-13.jpg',
            ],
            [
                'category_id' => $asesoris?->id,
                'name' => 'Headset Bluetooth Wireless ANC',
                'description' => 'Headset nirkabel dengan teknologi Active Noise Cancelling dan daya tahan baterai hingga 40 jam.',
                'price' => 450000,
                'stock' => 40,
                'image' => 'headset-bluetooth-anc.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
