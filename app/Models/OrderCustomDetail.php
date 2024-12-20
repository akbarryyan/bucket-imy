<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_custom_id', 'material_id', 'quantity', 'price'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}

