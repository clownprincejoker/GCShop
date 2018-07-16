<?php

namespace App\Http\Controllers\Auth\ShowRoomStaffControllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class ShowRoomStaffForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:showroomstaff');
    }

    protected function broker(){
      return Password::broker('showroomstaffs');
    }

    public function showLinkRequestForm()
    {
        return view('auth.showroomstaff.email');
    }
}
