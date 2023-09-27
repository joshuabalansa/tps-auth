<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status'
    ];

    public function getCode() {
        return $this->code;
    }
    public function getStatus() {
        return $this->status;
    }
}
