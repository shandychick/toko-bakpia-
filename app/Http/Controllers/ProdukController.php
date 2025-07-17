<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

   public function store(Request $request)
{
    // Simpan produk tanpa kode_produk dulu
    $produk = Produk::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'stok' => $request->stok,
        // 'kode_produk' belum diisi
    ]);

    // Baru setelah dapat ID, kita isi kode_produk
    $produk->kode_produk = 'BKP' . str_pad($produk->id, 3, '0', STR_PAD_LEFT);
    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
}


    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
