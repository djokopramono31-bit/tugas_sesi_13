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
            padding: 24px 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 1080px;
            margin: 0 auto;
        }

        /* Header kembali ke format tampilan awal di tengah */
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 1.85rem;
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 4px;
        }
        p.subtitle {
            color: #64748b;
            font-size: 0.92rem;
        }

        /* Kotak Kategori Produk: kembali ke struktur kotak awal */
        .categories-box {
            background: white;
            padding: 14px 20px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            margin-bottom: 20px;
        }
        .categories-box h2 {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #334155;
            font-weight: 700;
        }
        .badge-list {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .badge {
            background: #e0f2fe;
            color: #0369a1;
            padding: 5px 14px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .badge-count {
            background: #0284c7;
            color: white;
            font-size: 0.72rem;
            padding: 1px 6px;
            border-radius: 9999px;
        }

        /* Judul Seksi Produk */
        .section-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 14px;
            color: #0f172a;
        }

        /* Grid Produk: 3 kolom berdampingan, posisi turun sedikit lebih lega */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
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
            box-shadow: 0 3px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px -2px rgba(0,0,0,0.08);
        }

        /* Kotak Gambar: proporsional agar kartu dan harga muat pas dalam 1 layar */
        .product-image-box {
            height: 105px;
            background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            font-weight: 600;
            font-size: 0.9rem;
            position: relative;
        }
        .category-pill {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(15, 23, 42, 0.85);
            color: white;
            padding: 3px 10px;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .product-content {
            padding: 14px 16px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .product-name {
            font-size: 1.02rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
            line-height: 1.35;
            min-height: 2.7em;
        }
        .product-desc {
            color: #64748b;
            font-size: 0.82rem;
            line-height: 1.4;
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.8em;
        }

        /* Footer dengan Harga Produk yang jelas */
        .product-footer {
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-price {
            font-size: 1.18rem;
            font-weight: 800;
            color: #0284c7;
        }
        .product-stock {
            background: #f1f5f9;
            color: #475569;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.78rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header di tengah seperti tampilan awal -->
        <header>
            <h1>Tugas Sesi 13: E-Commerce</h1>
            <p class="subtitle">Verifikasi Data Awal (Seeder) & Kategori Produk pada Laravel 13</p>
        </header>

        <!-- Kotak Kategori Produk Tersedia -->
        <div class="categories-box">
            <h2>Kategori Produk Tersedia:</h2>
            <div class="badge-list">
                @forelse($categories as $category)
                    <div class="badge">
                        <span>🏷️ {{ $category->name }}</span>
                        <span class="badge-count">{{ $category->products->count() }} produk</span>
                    </div>
                @empty
                    <p style="color: #94a3b8; font-size: 0.85rem;">Belum ada data kategori.</p>
                @endforelse
            </div>
        </div>

        <!-- Daftar Produk Awal: Kotak turun sedikit dan harga-harga tetap kelihatan -->
        <h2 class="section-title">Daftar Produk Awal:</h2>
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
                <p style="color: #94a3b8; font-size: 0.85rem;">Belum ada data produk.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
