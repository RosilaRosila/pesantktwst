<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = [
        'datawisataid',
        'photo'
    ];

    public function fotowst()
    {
        return $this->belongsTo(DataWisata::class, 'datawisataid');
    }
}
