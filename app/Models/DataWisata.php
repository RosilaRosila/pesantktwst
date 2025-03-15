<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWisata extends Model
{
    use HasFactory;
    protected $table = 'data_wisatas';
    protected $primarykey = 'id';
    protected $fillable = ['title', 'image', 'deskripsi', 'readmore', 'imgheader', 'alamat'];

    public $incrementing = false;
    public $timestamps = true;

    public function reviews()
    {
        return $this->hasMany(Review::class, 'datawisataid');
    }
}
