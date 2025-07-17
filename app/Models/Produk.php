<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // << Tambahkan baris ini

   protected $fillable = ['nama', 'harga', 'stok', 'kode_produk'];

}
