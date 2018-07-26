<?php

namespace App\Models\MultiAuth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ConsumerResetPasswordNotification;

use App\Models\Purchase\Cart;
use App\Models\Other\Image;
use App\Models\Other\Address;
use App\Models\Other\PhoneNumber;
use App\Models\Other\MyFavourite;
use App\Models\Purchase\ResentView;
use App\Models\Purchase\TestDriving;

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

    public function getProfilePic(){
        if(Image::find($this->profile_pic)){
          return (Image::find($this->profile_pic))->uri;
        }
        else{
          return 'storage/images/temp.png';
        }
    }

    //consumers cart methods
    public function getCartProducts(){
        return Cart::where('consumer_id', $this->id)->where('sold', false)->get();
    }

    public function getTotalCostPerCart(){
        $carts = Cart::where('consumer_id', $this->id)->where('sold', false)->get();
        $total = 0;

        foreach ($carts as $cart) {
          $total += $cart->getTotalPartCost();
        }
        return number_format((float)$total, 2, '.', '');
    }

    public function getAddress(){
        return Address::find($this->address_id);
    }

    public function getPhoneNumber(){
        return PhoneNumber::find($this->phone_number_id);
    }

    public function getMyFavourites(){
        return MyFavourite::where('consumer_id', $this->id)->get();
    }

    public function getTestDrivingInfo(){
        return TestDriving::where('consumer_id', $this->id)->get();
    }
}
