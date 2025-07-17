@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form method="POST" action="{{ route('produk.update', $produk->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Produk:</label>
            <input type="text" name="nama" value="{{ $produk->nama }}" required>
        </div>
        <div>
            <label>Harga:</label>
            <input type="number" name="harga" value="{{ $produk->harga }}" required>
        </div>
        <div>
            <label>Stok:</label>
            <input type="number" name="stok" value="{{ $produk->stok }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
