<?php

namespace App\Models\MultiAuth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ConsumerResetPasswordNotification;

class Consumer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'date_of_birth', 'profile_pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ConsumerResetPasswordNotification($token));
    }

    public function getFullName(){
        return $this->first_name.' '.$this->last_name;
    }
}
