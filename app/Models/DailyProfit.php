<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyProfit extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'total_profit'];
}
