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

    /**
     * get random table code
     *
     * @return string
     */
    public function getCode() {
        return $this->code;
    }

    /**
     *get table status
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }
}
