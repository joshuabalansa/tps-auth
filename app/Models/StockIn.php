<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model {
   
    protected $fillable = [
        'stock_id',
        'product',
        'category',
        'quantity',
    ];
}
