@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Produk</h2>
    <form method="POST" action="{{ route('produk.store') }}">
        @csrf
        <div>
            <label>Nama Produk:</label>
            <input type="text" name="nama" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" name="harga" required>
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stok" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection