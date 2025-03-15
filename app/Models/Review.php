<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'name',
        'email',
        'review',
        'rating',
        'status',
        'datawisataid',
        'created_at'
    ];

    // public function pengungjung()
    // {
    //     return $this->belongsTo(Pengunjung::class, 'pengunjungid');
    // }

    public function datawist()
    {
        return $this->belongsTo(DataWisata::class, 'datawisataid');
    }
}
