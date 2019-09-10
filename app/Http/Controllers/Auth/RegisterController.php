<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;
use App\mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest');
      $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'pNumber' => 'required|string|max:255',
            'terms' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'type' => $data['type'],
            'title' => $data['title'],
            'lga' => $data['lga'],
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'pNumber' => $data['pNumber'],
            'confirmation_token' => Str::random(40),
            'pNumber' => $data['pNumber'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->roles()->attach(Roles::where('name','Public')->first());
        $thisUser=User::findOrFail($user->id);
        $this->sendEmail($thisUser);

        return $user;

    }



    public function sendEmail($thisUser)
    {
      Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
      return view("email.verifyEmailFirst");
    }

    public function sendEmailDone($email,$confirmationToken,Request $request)
    {
      $user=User::where([
        'email'=> substr($email,6),
        'confirmation_token'=>substr($confirmationToken,18),
      ])->first();
      if ($user) {
        User::where([
          'email'=> substr($email,6),
          'confirmation_token'=>substr($confirmationToken,18),
        ])->update([
          'isConfermed'=>1,
          'confirmation_token'=>null
        ]);
        return view("email/verifySuccess")->with('success',"email verification successful");
      }else {
        return view("email/verifySuccess")->with("error","User not found");
      }
    }
}
