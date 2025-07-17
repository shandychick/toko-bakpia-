<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Transaction;
use App\Models\TransactionItem;

class ResetProduk extends Command
{
    protected $signature = 'reset:produk';
    protected $description = 'Hapus semua produk, reset ID, dan isi data dummy (khusus untuk testing/demo)';

    public function handle()
    {
        // Hapus data yang berkaitan dulu agar tidak kena foreign key constraint
        TransactionItem::truncate();
        Transaction::truncate();

        // Hapus semua produk (pakai delete agar tidak kena FK error)
        Produk::query()->delete();

        // Reset auto increment ke 1
        DB::statement('ALTER TABLE produks AUTO_INCREMENT = 1');

        // Tambahkan data dummy produk
        $dummyProduk = [
            ['nama' => 'Bakpia Coklat', 'harga' => 8000, 'stok' => 100],
            ['nama' => 'Bakpia Keju', 'harga' => 8500, 'stok' => 120],
            ['nama' => 'Bakpia Kacang Hijau', 'harga' => 7500, 'stok' => 90],
            ['nama' => 'Bakpia Durian', 'harga' => 9000, 'stok' => 80],
        ];

        foreach ($dummyProduk as $item) {
            Produk::create($item);
        }

        $this->info('✅ Produk berhasil direset dan diisi ulang dengan data dummy.');
    }
}
