@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🏠 Selamat Datang di Dashboard Kasir Bakpia</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <a href="{{ route('kasir.index') }}" class="card shadow-sm text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <h3>🛒</h3>
                    <h5>Transaksi Kasir</h5>
                    <p>Mulai proses penjualan & cetak nota.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('produk.index') }}" class="card shadow-sm text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <h3>📦</h3>
                    <h5>Kelola Produk</h5>
                    <p>Tambah & atur data stok produk.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('kasir.laporan') }}" class="card shadow-sm text-decoration-none text-dark h-100">
                <div class="card-body text-center">
                    <h3>📊</h3>
                    <h5>Laporan Penjualan</h5>
                    <p>Lihat riwayat & total omzet.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
