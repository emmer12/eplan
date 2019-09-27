<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approval;
use App\User;

class UserController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
