<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'time_from',
        'time_to',
        'status',
        'time'
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

    /**
     * sets time function
     *
     * @return string $formattedTime
     */
    public function getReservationTime() {

      $time = Carbon::createFromFormat('H:i:s', $this->time);

      $formattedTime = $time->format('h:i:s A');

      return $formattedTime;
    }
    /**
     * return status function default = pending
     *
     * @return string
     */
    public function getStatus() {

        return $this->status;
    }

    // public function setTimeAttribute($value)
    // {
    //     $this->attributes['time'] = Carbon::createFromFormat('H:i:s', $value)->format('h:i:s A');
    // }
    
}
