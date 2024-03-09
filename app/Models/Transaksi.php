<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'nomor_struk');
    }
    public function cashier()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
