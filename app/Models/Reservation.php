<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'table',
        'special_request',
        'reservation_date'
    ];

    /**
     * get fullname function
     *
     * @return string $fullname
     */
    public function getName() {

        $fullname = $this->firstname . ' ' .$this->lastname;

        return $fullname;
    }

    /**
     * get phone function
     *
     * @return int
     */
    public function getPhone() {

        return $this->phone;
    }

    /**
     * get email function
     *
     * @return string
     */
    public function getEmail() {

        return $this->email;
    }

    /**
     * get special request function
     *
     * @return string
     */
    public function getSpecialRequest() {

        return $this->special_request;
    }

    
    /**
     * get special request function
     *
     * @return string
     */
    public function getReservationDate() {

        return \Carbon\Carbon::parse($this->reservation_date)->format('F d, Y');
    }
}
