<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['category_id', 'category'];

    public function getCategoryName() {
        
        return ucwords($this->category);
    }
}
