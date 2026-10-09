<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    $categories = Schema::hasTable('categories') ? Category::with('products')->get() : collect();
    $products = Schema::hasTable('products') ? Product::with('category')->get() : collect();

    return view('welcome', compact('categories', 'products'));
});

Route::get('/products', function () {
    $categories = Schema::hasTable('categories') ? Category::with('products')->get() : collect();
    $products = Schema::hasTable('products') ? Product::with('category')->get() : collect();

    return view('welcome', compact('categories', 'products'));
});
