<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota Penjualan</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            padding: 10px;
            width: 250px; /* ukuran struk kecil */
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .nota-item {
            border-bottom: 1px dashed #000;
            padding: 5px 0;
        }

        .total {
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
        }

        @media print {
            body {
                margin: 0;
                width: auto;
            }

            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h2>🧾 Bakpia Store</h2>
    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->transaction_date }}</p>

    <hr>

    @foreach($transaksi->items as $item)
        <div class="nota-item">
            {{ $item->produk->nama }}<br>
            {{ $item->quantity }} x Rp{{ number_format($item->produk->harga) }} = Rp{{ number_format($item->subtotal) }}
        </div>
    @endforeach

    <div class="total">
        Total: Rp{{ number_format($transaksi->total) }}
    </div>

    <div class="footer">
        Terima kasih telah berbelanja!<br>
        ~ Bakpia Bantul 5555  ~
    </div>

    <button class="btn-print" onclick="window.print()">🖨️ Cetak</button>
</body>
</html>
