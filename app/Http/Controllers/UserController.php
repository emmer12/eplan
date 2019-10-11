<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approval;
use App\User;

class UserController extends Controller
{

  // public function __construct()
  // {
  //   $this->middleware('auth');
  //
  // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function user_dash()
    {
      $applications=User::find(1)->applications()->orderBy('created_at','desc')->get();
      $pending=User::find(1)->applications->where("status","Pending");
      $approved=User::find(1)->applications->where("status","Approved");
      return view("generalPublic/dashboard")->with([
        "applications"=>$applications,
        "pending"=>$pending,
        "approved"=>$approved,
      ]);
    }

    public function redirectFromNav()
    {
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

    //
    //
    // // Get single Application
    // public function appDetails($id)
    //     {
    //       $appDetails=Approval::where("id",$id)->firstOrFail();
    //       return view('admin/appDetails')->with('appDetails',$appDetails);
    //     }
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // status Checker

    public function checker(Request $request)
    {
        if ($request->ajax()) {
          $application=Approval::where('id',$request->input("appId"))->first();
          if (count($application) < 1) {
            return response(['success'=>false,'msg'=>"Application with Id : ".$request->input("appId")." not Found"]);
          }
           return response(['success'=>true,'status'=>$application->status]);
        }
    }


}
