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

        return Carbon::parse($this->reservation_date)->format('F d, Y');
    }

    /**
     * sets time function
     *
     * @return string $time
     */
    public function getReservationTime() {
        try {

            $currentTime = Carbon::now();
            $reservationDate = Carbon::parse($this->reservation_date)->format('Y-m-d');
            $timeFrom = Carbon::createFromFormat('H:i:s', $this->time_from)->format('h:i:s A');
            $timeTo = Carbon::createFromFormat('H:i:s', $this->time_to)->format('h:i:s A');
    
            if ($currentTime > $reservationDate  && $currentTime > $timeTo) {
                return 'Reservation Ended';
            }
    
            $time = "{$timeFrom} - {$timeTo}";
            return $time;
    
        } catch (\Exception $e) {
            return 'Error Time';
        }
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
