<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class PesanTiket extends Model
{
    use HasFactory;

    protected $table = 'pesantikets';
    // protected $primaryKey = 'kode_transaksi';
    protected $fillable = [
        'kode_transaksi',
        'name',
        'nohp',
        'wisatawan',
        'datatiketid',
        'hargatiket',
        'qty',
        'totalharga',
        'tanggal',
        'status',
        'kehadiran',
        'snap_token',
        // 'pembayaranid',
        'created_at',
        'updated_at'
    ];

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d, M Y H:i');
    }

    // public $incrementing = false;
    // public $timestamps = true;

    public function datatiket()
    {
        return $this->belongsTo(DataTiket::class, 'datatiketid');
    }

    // public function datapembayaran()
    // {
    //     return $this->belongsTo(Pembayaran::class, 'pembayaranid');
    // }

    public function posts()
    {
        return $this->hasMany(Pembayaran::class, 'pesantiketid', 'id');
    }

    // public function pem()
    // {
    //     return $this->hasMany(Pembayaran::class);
    // }
}
