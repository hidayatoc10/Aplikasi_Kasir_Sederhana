<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function product()
    {
        return $this->belongsTo(Produks::class, 'nama_produk');
    }
}
