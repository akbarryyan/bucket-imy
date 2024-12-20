<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustom extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shipping_method', 'delivery_time', 'shipping_address', 'payment_method', 'payment_proof', 'total_price', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->hasMany(OrderCustomDetail::class);
    }
}
