@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📦 Kelola Produk Bakpia</h2>

    {{-- Tombol tambah --}}
    <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">➕ Tambah Produk</a>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel produk --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Nama</th>
                        <th style="width: 20%;">Harga (Rp)</th>
                        <th style="width: 10%;">Stok</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>
                                <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                                <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus produk ini?')" class="btn btn-sm btn-secondary">🗑️ Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada produk.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
