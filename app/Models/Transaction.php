<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_date', // ⬅️ Tambahkan ini
        'total',
    ];

   // App\Models\Transaction.php

public function items()
{
    return $this->hasMany(TransactionItem::class, 'transaction_id');
}


}
