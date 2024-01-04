<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class StockIn extends Model {
   
    protected $fillable = [
        'stock_id',
        'product',
        'category',
        'quantity',
    ];

    public function getCategory() {
        
        $category = Category::where('category_id', $this->category)->get();

        $categoryArray = $category->pluck('category')->toArray();

        $categoryString = implode(', ', $categoryArray);
        
        return $categoryString;
    }
}
