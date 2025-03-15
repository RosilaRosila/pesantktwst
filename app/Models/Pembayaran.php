<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = [
        'name',
        'kode_transaksi',
        'wisatawan',
        'tujuanwisata',
        'qty',
        'total',
        'tanggal',
        'status'


    ];

    // public function datametode()
    // {
    //     return $this->belongsTo(MetodePembayaran::class, 'metodeid');
    // }

    // public function dataorder()
    // {
    //     return $this->belongsTo(PesanTiket::class, 'pesantiketid');
    // }

    // public function pem()
    // {
    //     return $this->hasMany(Pembayaran::class);
    // }
}
