<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    /**
     * 
     * @var array
     */
    protected $fillable = [
        'item',
        'description',
        'manufacturer',
        'quantity',
        'cost'
    ];

    /**
     * This method return the stock id
     * 
     * @return int
     */
    public function getId() {
        return $this->id;
    }


    /**
     * This method will return the name of on item
     * 
     * @return string
     */
    public function getItem() {
        return $this->item;
    }

    /**
     * This method will return description
     * 
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * This method will return the name
     * of manufacturer
     * 
     * @return string
     */
    public function getManufacturer() {
        return $this->manufacturer;
    }

    /**
     * This method will return the quantity
     * of an item
     * 
     * @return int
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * 
     * @return float
     */
    public function getCost() {
        return $this->cost;
    }
    
}