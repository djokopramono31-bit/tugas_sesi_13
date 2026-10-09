<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TugasSesi13Test extends TestCase
{
    use RefreshDatabase;

    public function test_tables_structure_exist(): void
    {
        // 1. Kategori produk (id, name)
        $this->assertTrue(Schema::hasTable('categories'));
        $this->assertTrue(Schema::hasColumns('categories', ['id', 'name']));

        // 2. Produk (id, name, description, stock, image)
        $this->assertTrue(Schema::hasTable('products'));
        $this->assertTrue(Schema::hasColumns('products', ['id', 'name', 'description', 'stock', 'image']));

        // 3. Pengguna (id, name, email, password)
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasColumns('users', ['id', 'name', 'email', 'password']));

        // 4. Pesanan (id, user_id, product_id, quantity, total)
        $this->assertTrue(Schema::hasTable('orders'));
        $this->assertTrue(Schema::hasColumns('orders', ['id', 'user_id', 'product_id', 'quantity', 'total']));
    }

    public function test_seeder_creates_3_categories_and_3_products(): void
    {
        $this->seed(CategorySeeder::class);
        $this->seed(ProductSeeder::class);

        $this->assertDatabaseHas('categories', ['name' => 'Elektronik']);
        $this->assertDatabaseHas('categories', ['name' => 'Buku']);
        $this->assertDatabaseHas('categories', ['name' => 'Asesoris']);
        $this->assertCount(3, Category::all());

        $this->assertCount(3, Product::all());

        $elektronik = Category::where('name', 'Elektronik')->first();
        $buku = Category::where('name', 'Buku')->first();
        $asesoris = Category::where('name', 'Asesoris')->first();

        $this->assertNotNull($elektronik);
        $this->assertNotNull($buku);
        $this->assertNotNull($asesoris);

        $this->assertCount(1, $elektronik->products);
        $this->assertCount(1, $buku->products);
        $this->assertCount(1, $asesoris->products);
    }

    public function test_relationships_work(): void
    {
        $this->seed(CategorySeeder::class);
        $this->seed(ProductSeeder::class);

        $user = User::factory()->create();
        $product = Product::first();

        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'total' => $product->price * 2,
        ]);

        $this->assertEquals($user->id, $order->user->id);
        $this->assertEquals($product->id, $order->product->id);
        $this->assertCount(1, $user->orders);
        $this->assertCount(1, $product->orders);
    }
}

