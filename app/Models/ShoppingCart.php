<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cashier()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Produks::class, 'products_id');
    }
}
