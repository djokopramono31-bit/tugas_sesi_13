<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('tugas:lihat', function () {
    $this->info('====================================');
    $this->info('   DATA KATEGORI (TUGAS SESI 13)');
    $this->info('====================================');
    $categories = Category::all(['id', 'name']);
    $this->table(['ID', 'Nama Kategori'], $categories->toArray());

    $this->newLine();
    $this->info('====================================');
    $this->info('   3 DATA PRODUK AWAL BERBEDA KATEGORI');
    $this->info('====================================');
    $products = Product::with('category')->get()->map(function ($p) {
        return [
            'ID' => $p->id,
            'Kategori' => $p->category?->name ?? '-',
            'Nama Produk' => $p->name,
            'Harga' => 'Rp ' . number_format($p->price, 0, ',', '.'),
            'Stok' => $p->stock,
            'Gambar' => $p->image,
        ];
    });
    $this->table(['ID', 'Kategori', 'Nama Produk', 'Harga', 'Stok', 'Gambar'], $products->toArray());
})->purpose('Melihat 3 data awal produk dan kategori Tugas Sesi 13');
