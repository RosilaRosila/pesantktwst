<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $primarykey = 'id';
    protected $fillable = ['namaicon', 'imgicon'];

    public $incrementing = false;
    public $timestamps = true;
}
