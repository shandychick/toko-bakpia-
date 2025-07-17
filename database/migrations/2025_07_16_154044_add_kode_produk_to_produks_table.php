<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::table('produk', function (Blueprint $table) {
        $table->string('kode_produk')->nullable()->after('id'); // Atur posisi kolom kalau mau
    });
}

public function down()
{
    Schema::table('produk', function (Blueprint $table) {
        $table->dropColumn('kode_produk');
    });
}

};
