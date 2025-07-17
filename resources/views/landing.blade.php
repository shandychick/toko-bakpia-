@extends('layouts.landing')

@section('content')
<style>
    .landing-hero {
        background: linear-gradient(to right, #f8f9fa, #e3f2fd);
        padding: 80px 20px;
        text-align: center;
    }
    .hero-title {
        font-size: 3rem;
        font-weight: bold;
        color: #0d6efd;
    }
    .hero-subtitle {
        font-size: 1.5rem;
        color: #495057;
        margin-bottom: 30px;
    }
    .hero-btn {
        font-size: 1.2rem;
        padding: 12px 30px;
    }
    .feature-icon {
        font-size: 3rem;
        color: #0d6efd;
    }
</style>

<div class="landing-hero">
    <h1 class="hero-title">Selamat Datang di Bakpianyaa Fitriii</h1>
    <p class="hero-subtitle">Sistem Kasir Digital untuk Toko Bakpia Modern</p>
    <a href="{{ route('login') }}" class="btn btn-primary hero-btn">🔐 Masuk ke Aplikasi</a>
</div>

<div class="container py-5">
    <div class="row text-center mb-4">
        <div class="col">
            <h2 class="fw-bold">Fitur Unggulan</h2>
            <p class="text-muted">Nikmati kemudahan mengelola penjualan dengan fitur modern.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="feature-icon mb-3">🛒</div>
                    <h5 class="card-title">Transaksi Kasir</h5>
                    <p class="card-text">Proses belanja cepat dan akurat dengan fitur checkout langsung dan struk otomatis.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="feature-icon mb-3">📦</div>
                    <h5 class="card-title">Kelola Produk</h5>
                    <p class="card-text">Tambah, ubah, dan kelola stok produk bakpia langsung dari dashboard.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="feature-icon mb-3">📈</div>
                    <h5 class="card-title">Laporan Penjualan</h5>
                    <p class="card-text">Lihat riwayat transaksi, total omzet, dan cetak nota penjualan dengan mudah.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
