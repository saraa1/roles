<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;

    protected function redirectTo()
    {
       if(Auth::user()->isAdmin()){

           return $this->redirectTo ='admin';
       }

       elseif (Auth::user()->isPatient()){

           return $this->redirectTo ='patient';
       }
       elseif (Auth::user()->isPsychiatrist()){

           return $this->redirectTo ='psychiatrist';
        }
        else
            return $this->redirectTo='404';


//        $user = Auth::user()->role_id;
//
//        if($user == 1){
//
//            return $this->redirectTo = 'dashboard';
//
//        }
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
