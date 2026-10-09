<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Sesi 13 - Katalog E-Commerce</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Figtree', sans-serif;
            background: #f8fafc;
            color: #1e293b;
            padding: 18px 24px;
            min-height: 100vh;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 10px;
        }
        .header-title h1 {
            font-size: 1.45rem;
            color: #0f172a;
            font-weight: 800;
        }
        .header-title p {
            color: #64748b;
            font-size: 0.85rem;
        }
        .badge-laravel {
            background: #fef2f2;
            color: #ef4444;
            border: 1px solid #fecaca;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        /* Baris Kategori: dibuat sejajar dan naik ke atas agar hemat tempat */
        .categories-bar {
            background: white;
            padding: 9px 18px;
            border-radius: 10px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.04);
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }
        .categories-title {
            font-size: 0.92rem;
            font-weight: 700;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .badge-list {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .badge {
            background: #f0f9ff;
            color: #0284c7;
            border: 1px solid #bae6fd;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.82rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .badge-count {
            background: #0284c7;
            color: white;
            font-size: 0.7rem;
            padding: 1px 6px;
            border-radius: 9999px;
        }

        .section-header {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* 3 Produk dalam 1 Baris di Layar Laptop */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }
        @media (max-width: 860px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.06);
        }
        .product-image-box {
            height: 90px;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-weight: 600;
            font-size: 0.85rem;
            position: relative;
        }
        .category-pill {
            position: absolute;
            top: 8px;
            left: 10px;
            background: #0f172a;
            color: white;
            padding: 3px 9px;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.3px;
        }
        .product-content {
            padding: 12px 14px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .product-name {
            font-size: 0.98rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
            line-height: 1.3;
            min-height: 2.6em;
        }
        .product-desc {
            color: #64748b;
            font-size: 0.8rem;
            line-height: 1.35;
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.7em;
        }
        .product-footer {
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-price {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0284c7;
        }
        .product-stock {
            background: #f1f5f9;
            color: #475569;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header ringkas -->
        <header>
            <div class="header-title">
                <h1>Tugas Sesi 13: E-Commerce</h1>
                <p>Verifikasi Data Awal (Seeder) & Kategori Produk</p>
            </div>
            <span class="badge-laravel">Laravel 13</span>
        </header>

        <!-- Baris Kategori Produk: Dinaikkan dan dibuat sejajar horizontal -->
        <div class="categories-bar">
            <div class="categories-title">
                <span>🏷️ Kategori Produk Tersedia:</span>
            </div>
            <div class="badge-list">
                @forelse($categories as $category)
                    <div class="badge">
                        <span>{{ $category->name }}</span>
                        <span class="badge-count">{{ $category->products->count() }} produk</span>
                    </div>
                @empty
                    <span style="color: #94a3b8; font-size: 0.8rem;">Belum ada data kategori.</span>
                @endforelse
            </div>
        </div>

        <!-- Daftar 3 Produk Awal -->
        <div class="section-header">
            <span>📦 3 Produk Awal Berbeda Kategori:</span>
        </div>
        <div class="products-grid">
            @forelse($products as $product)
                <div class="product-card">
                    <div class="product-image-box">
                        <span class="category-pill">{{ $product->category?->name ?? 'Tanpa Kategori' }}</span>
                        <span>📷 {{ $product->image }}</span>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-desc">{{ $product->description }}</p>
                        <div class="product-footer">
                            <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="product-stock">Stok: {{ $product->stock }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p style="color: #94a3b8;">Belum ada data produk.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
