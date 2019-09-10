<?php

namespace App\Http\Controllers;
use App\Approval;
use App\User;

class AdminRouteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function dashboard()
    {
      $applications=User::find(1)->applications()->orderBy('created_at','desc')->get();
      $pending=User::find(1)->applications->where("status","Pending");
      $approved=User::find(1)->applications->where("status","Approved");
      return view("admin/dashboard")->with([
        "applications"=>$applications,
        "pending"=>$pending,
        "approved"=>$approved,
      ]);
     }

     
     // Get single Application
     public function appDetails($slug)
         {
           $appDetails=Approval::where("slug",$slug)->firstOrFail();
           return view('admin/appDetails')->with('appDetails',$appDetails);
         }


}
