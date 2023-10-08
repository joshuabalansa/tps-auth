<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * get user name function
     *
     * @return string
     */
    public function getName() {

        return $this->name;
    }

     /**
     * get user email function
     *
     * @return string
     */
    public function getEmail() {

        return $this->email;
    }

     /**
     * get user role function
     *
     * @return string
     */
    public function getRole() {

        $role = '';

        switch($this->role) {
            case 0: 
                $role = 'Deactivated';
              break;
              
            case 1: 
              $role = 'System Admin';
            break;
            
            case 2: 
                $role = 'Administrator';
            break;

            case 3: 
                $role = 'Cashier';
            break;

            case 4: 
                $role = 'Kitchen Orders';
            break;

            default:
            break;
        }
        return $role;
    }
}
