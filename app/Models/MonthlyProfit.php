<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyProfit extends Model
{
    use HasFactory;
    protected $fillable = ['month', 'total_profit'];
}
