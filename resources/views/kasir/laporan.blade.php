@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📊 Laporan Penjualan</h2>

    @foreach ($transaksi as $t)
    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <div>
                <strong>ID Transaksi:</strong> #{{ $t->id }} <br>
                <strong>Tanggal:</strong> {{ $t->transaction_date }}
            </div>
            <div>
                <a href="{{ route('kasir.nota', $t->id) }}" target="_blank" class="btn btn-sm btn-outline-primary">
    🖨 Cetak Nota
</a>

            </div>
        </div>
        

        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($t->items as $item)
                    <tr>
                        <td>{{ $item->produk->nama }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total</strong></td>
                        <td><strong>Rp{{ number_format($t->total, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection
