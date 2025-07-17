<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class KasirController extends Controller
{
   public function index()
{
    $produk = Produk::all();
    return view('kasir.index', compact('produk'));
}


   public function addToCart(Request $request)
{
    $produk = Produk::find($request->produk_id);

    if (!$produk) return back()->with('error', 'Produk tidak ditemukan.');
    if ($produk->stok < $request->jumlah) return back()->with('error', 'Stok tidak mencukupi.');

    $cart = session()->get('cart', []);

    // Cek kalau produk sudah ada di keranjang
    $exists = false;
    foreach ($cart as &$item) {
        if ($item['id'] == $produk->id) {
            $item['jumlah'] += $request->jumlah;
            $exists = true;
            break;
        }
    }
    if (!$exists) {
        $cart[] = [
            'id' => $produk->id,
            'nama' => $produk->nama,
            'harga' => $produk->harga,
            'jumlah' => $request->jumlah,
        ];
    }

    session()->put('cart', $cart);
   return redirect()->back()->with('cart_success', 'Produk berhasil ditambahkan ke keranjang.');

}

public function checkout()
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'Keranjang kosong.');
    }

    $total = 0;

    // Buat transaksi utama
    $transaksi = Transaction::create([
        'transaction_date' => now(),
        'total' => 0, // isi nanti
    ]);

    foreach ($cart as $item) {
        $produk = Produk::find($item['id']);

        if (!$produk || $produk->stok < $item['jumlah']) {
            continue; // skip jika stok kurang
        }

        $subtotal = $item['harga'] * $item['jumlah'];
        $total += $subtotal;

        // Kurangi stok
        $produk->stok -= $item['jumlah'];
        $produk->save();

        // Simpan item transaksi
        TransactionItem::create([
            'transaction_id' => $transaksi->id,
            'produk_id' => $produk->id,
            'quantity' => $item['jumlah'],
            'subtotal' => $subtotal,
        ]);
    }

    $transaksi->update(['total' => $total]);
    session()->forget('cart');

    return redirect()->back()->with('success', 'Transaksi berhasil.');
}

public function resetCart()
{
    session()->forget('cart');
   return redirect()->back()->with('cart_success', 'Prduk Berhasil Dikosongkan');

}



    public function laporan()
    {
        $transaksi = Transaction::with('items.produk')->latest()->get();
         
        return view('kasir.laporan', compact('transaksi'));
        
    }



    public function cetakNota($id)
{
    $transaksi = Transaction::with('items.produk')->findOrFail($id);
    return view('kasir.nota', compact('transaksi'));
}






}






