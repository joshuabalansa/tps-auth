<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'address',
        'phone',
        'email',
        'birthdate',
        'role',
        'salary',
        'emergency_number'
    ];

    /**
     * 
     * @return string
     */
    public function getFullname() {
        $fullname = ucfirst($this->firstname) . " " . strtoupper($this->middlename[0]) . ", " . ucfirst($this->lastname);
        return $fullname;
    }

    /**
     * 
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * 
     * @return string 
     */

    public function getMiddlename() {
        return $this->middlename;
    }

    /**
     * 
     * @return string
     */
    public function getLastName() {
        return $this->lastname;
    }

    /**
     * 
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * 
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * 
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * 
     * @return string
     */
    public function getBirthdate() {
        return $this->birthdate;
    }

    /**
     * 
     * @return string
     */
    public function getRole() {
    
        $role = ($this->role == 1) ? 'Cashier' : (($this->role == 2) ? 'Kitchen' : 'Staff');
        return $role;
    }

    /**
     * 
     * @return string
     */
    public function getSalary() {
        return $this->salary;
    }

    /**
     * 
     * @return string
     */
    public function getEmergencyNumber() {
        return $this->emergency_number;
    }
}