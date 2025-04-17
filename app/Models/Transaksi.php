<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
        'kode_transaksi',
        'id_user',
        'id_produk',
        'jumlah',
        'total_harga',
        'status',
    ];
    protected $table = 'transaksis';
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
