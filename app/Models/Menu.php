<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
// use Category;
class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'status'
    ];


    /**
     * name of the menu
     * 
     * @return string
     */
    public function getName() {
        $name = ucfirst($this->name);
        return $name;
    }
    

    /**
     * Truncated description
     * 
     * @return string
     */
    public function getDescription() {
        $limitedText = Str::words($this->description, 4, '...');
        return $limitedText;
    }

    /**
     * 
     * @return string
     */
    public function getCategory() {
        $categories = Category::where('category_id', $this->category)->get();
        return $categories;
    }

    /**
     * This method will return the price of the menu
     * 
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }


    /**
     * return the status of the product
     * 
     * Method returns status if 1 it will return available
     * otherwise it will return false
     * 
     * @return string
     */
    public function getStatus() {
        $status = $this->status == 1 ? 'Available' : 'Draft';
        return $status;
    }
}
