<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu',
        'order_number',
        'category',
        'quantity',
        'price',
        'image',
        'status',
        'is_completed',
    ];

    /**
     * @return string
     */
    public function getStatus() {
        $status = $this->status == 0 ? 'unpaid' : 'paid';
        return ucfirst($status);
    }
    /**
     * @return string
     */
    public function getdate() {
        $carbonTimestamp = Carbon::parse($this->created_at);
        $timeAgo = $carbonTimestamp->diffForHumans();
        return $timeAgo;
    }

    public function getPrice() {
        return $this->price;
    }
}