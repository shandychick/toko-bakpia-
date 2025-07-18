@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Heading --}}
    <div class="card mb-4 shadow" style="background-color: #6D942C;">
        <div class="card-header text-white" style="background-color: #6D942C;">
            <h4 class="mb-0">🧾 Kasir - Transaksi Bakpia</h4>
        </div>
    </div>

    <div class="row">
        {{-- Form Transaksi dan Keranjang --}}
        <div class="col-md-5">
            {{-- Form --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header text-white" style="background-color: #6D942C;">📝 Input Produk</div>
                <div class="card-body" style="background-color: #ffffff;">
                    <form method="POST" action="{{ route('kasir.add') }}" onkeypress="return enterSubmit(event)">
                        @csrf
                        <div class="mb-3">
                            <label for="produk_id">ID Produk:</label>
                            <input type="text" name="produk_id" id="produk_id" class="form-control" required oninput="cariProduk()">
                        </div>
                        <div class="mb-3">
                            <label>Nama Produk:</label>
                            <input type="text" id="nama_produk" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Harga:</label>
                            <input type="text" id="harga_produk" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label>Stok:</label>
                            <input type="text" id="stok_produk" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
                        </div>
                        <button type="submit" class="btn text-white w-100" style="background-color: #6D942C;">+ Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>

            {{-- Keranjang --}}
            @if(session('cart'))
            <div class="card shadow-sm mb-4">
                <div class="card-header text-white" style="background-color: #6D942C;">🛒 Keranjang Belanja</div>
                <div class="card-body p-0" style="background-color: #ffffff;">
                    <table class="table table-sm table-bordered mb-0">
                        <thead style="background-color: #ABD673;">
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $item)
                                @php $subtotal = $item['jumlah'] * $item['harga']; $total += $subtotal; @endphp
                                <tr>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['jumlah'] }}</td>
                                    <td>Rp{{ number_format($item['harga']) }}</td>
                                    <td>Rp{{ number_format($subtotal) }}</td>
                                </tr>
                            @endforeach
                            <tr style="background-color: #ABD673;">
                                <td colspan="3"><strong>Total</strong></td>
                                <td><strong>Rp{{ number_format($total) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between" style="background-color: #ffffff;">
                    <form action="{{ route('kasir.checkout') }}" method="POST">
                        @csrf
                        <button class="btn text-white" style="background-color: #6D942C;">💳 Bayar</button>
                    </form>
                    <form action="{{ route('kasir.reset') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">🗑 Kosongkan</button>
                    </form>
                </div>
            </div>
            @endif
        </div>

        {{-- Daftar Produk --}}
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #6D942C;">
                    <span>📦 Daftar Produk</span>
                    <input type="text" id="searchInput" onkeyup="filterProduk()" class="form-control w-50" placeholder="Cari produk...">
                </div>
                <div class="card-body p-0" style="background-color: #ffffff;">
                    <table class="table table-hover table-bordered mb-0" id="produkTable">
                        <thead style="background-color: #ABD673;">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $p)
                            <tr onclick="isiForm({{ $p->id }})" style="cursor: pointer;">
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                                <td>{{ $p->stok }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @if(session('cart_success'))
        <div class="alert alert-success mt-3">
            {{ session('cart_success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>

{{-- SweetAlert for checkout --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success') === 'Transaksi berhasil.')
<script>
    Swal.fire({
        icon: 'success',
        title: 'Transaksi Berhasil!',
        text: 'Terima kasih telah berbelanja di Bakpia Fitri',
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

{{-- JS: Produk --}}
<script>
    const dataProduk = @json($produk);

    function cariProduk() {
        const id = document.getElementById('produk_id').value;
        const produk = dataProduk.find(p => p.id == id);
        document.getElementById('nama_produk').value = produk?.nama || '';
        document.getElementById('harga_produk').value = produk ? 'Rp' + produk.harga.toLocaleString('id-ID') : '';
        document.getElementById('stok_produk').value = produk?.stok || '';
    }

    function isiForm(id) {
        const produk = dataProduk.find(p => p.id == id);
        if (produk) {
            document.getElementById('produk_id').value = produk.id;
            document.getElementById('nama_produk').value = produk.nama;
            document.getElementById('harga_produk').value = 'Rp' + produk.harga.toLocaleString('id-ID');
            document.getElementById('stok_produk').value = produk.stok;
            document.getElementById('jumlah').focus();
        }
    }

    function filterProduk() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("#produkTable tbody tr");
        rows.forEach(row => {
            const cells = row.getElementsByTagName("td");
            let match = Array.from(cells).some(cell => cell.innerText.toLowerCase().includes(input));
            row.style.display = match ? "" : "none";
        });
    }

    function enterSubmit(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.querySelector("form").submit();
        }
    }

    window.onload = () => document.getElementById('produk_id').focus();
</script>
@endsection
