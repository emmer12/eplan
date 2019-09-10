<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use App\User;

use Auth;

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
     * Where to redirect users after login.
     *
     * @var string
     */

  protected function validator(array $data)
      {
          return Validator::make($data, [
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
          ]);
      }

    // protected function redirectTo(){
    //   if(Auth::user()->type=="general-public-user"){
    //     return '/dashboard';
    //   }
    //   else {
    //     return '/pro-dashboard';
    //   }
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }




    public function customLogin(Request $request)
    {
      $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|min:6'
      ]);


      if (Auth::attempt([
           'email'=>$request->email,
           'password'=>$request->password
        ])) {

        if (User::find(1)->roleRedirect('Director')) {
          return redirect("admin/dashboard");
        }
        if (User::find(1)->roleRedirect('AreaOfficer')) {
          return redirect()->route('areaOfficer.dashboard');
        }
        if (User::find(1)->roleRedirect('InspectionOfficer')) {
          return redirect()->route('InspectionOfficer.dashboard');
        }
        else{
          return redirect()->intended('/dashboard');
        }
      }
        Session::flash('msg','inverlid cridentials, please try again');
        return redirect()->back();
    }






    // public function loginProcess(Request $request )
    //   {
    //     $this->validate($request,[
    //       'username'=>'required',
    //       'password'=>'required|min:6'
    //     ]);
    //     if (Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password],$request->get('remember'))) {
    //       Auth::logout();
    //       return  redirect()->intended('/admin/dashboard');
    //     }
    //     return back()->withInput($request->only('username'))->with(array(
    //       'msg'=>"Inavalid Username or Password"
    //       ));
    //   }
}
