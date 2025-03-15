<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTiket extends Model
{
    use HasFactory;

    protected $table = 'data_tikets';
    protected $primarykey = 'id';
    protected $fillable = ['namawst', 'harga'];

    public $incrementing = false;
    public $timestamps = true;
}
