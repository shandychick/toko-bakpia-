<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
     protected $fillable = [
        'transaction_id', //  ini
        'produk_id',
        'quantity',
        'subtotal',
    ];

public function produk()
{
    return $this->belongsTo(Produk::class, 'produk_id');
}

}
