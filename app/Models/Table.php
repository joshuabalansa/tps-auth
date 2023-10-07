<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'status'
    ];


    /**
     * get table name function
     * @return string
     */
    public function getTableName() {

        return $this->table_name;
    }
    
    /**
     * get table status function
     * @return string
     */
    public function getStatus() {

        return ucfirst($this->status);
    }
}
