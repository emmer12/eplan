<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approval;
use App\Received;
use App\Feedbacks;
use App\User;
use App\InspectionTime;
class ApplicationController extends Controller
{
    public function getAll($value='')
    {
      // code...
    }
    public function getSingle($value='')
    {
      // code...
    }

    public function statusFilter(Request $request)
    {
      if ($request->ajax()) {
        $target=$request->input("status");
        $lga=User::find(auth()->user()->id)->lga()->get();
        $status=Approval::where('status',$target)->where('lga',$lga[0]->name)->get();
        return response(['success'=>true,'data'=>$status]);
      }
    }
    public function received(Request $request)
    {
      if ($request->ajax()) {
          $this->validate($request,[
            'time'=>'required',
            'date1'=>'required',
            'date2'=>'required',
            'date3'=>'required',
            'allocation'=>'required',
            'inspection'=>'required',
            'assessment_fee'=>'required',
            '_token'=>'required',
      ]);
        $received=Approval::find($request->input("appId"))->application()->get();
        if (count($received)>0) {
          return response([
            'status'=>"received"
          ]);
        }else {
          $requests=new Received();
          $requests->allocation=$request->input("allocation");
          $requests->inspection=$request->input("inspection");
          $requests->approval_id=$request->input("appId");
          $requests->meetup_time=$request->input("time");
          $requests->assessment=$request->input("assessment_fee");
          $requests->total_payment=$request->input("allocation")+$request->input("inspection")+$request->input("accessment_fee");
          $requests->save();


          $inspectionDate=new InspectionTime();
          $inspectionDate->time=$request->input("time");
          $inspectionDate->date1=$request->input("date1");
          $inspectionDate->date2=$request->input("date2");
          $inspectionDate->date3=$request->input("date3");
          $inspectionDate->received_id=$requests->id;
          $inspectionDate->save();

          Approval::where('id',$request->input("appId"))->update(['status'=>'Received']);
          return response([
            'status'=>"success",
          ]);
        }

    }
}
public function reject(Request $request)
{
  if ($request->ajax()) {
    {
      $this->validate($request,[
        'msg'=>'required',
        'appId'=>'required',
        '_token'=>'required',
      ]);

    $post=new Feedbacks();
    $post->messages=$request->input("msg");
    $post->application_id=$request->input("appId");
    $post->user_id=$request->input("userId");
    $post->type="Rejected";
    $post->save();
    Approval::where('id',$request->input("appId"))->update(['status'=>'Rejected']);
    return response([
      'status'=>"success",
    ]);
  }
}
}

public function paygo(Request $request)
{
  if ($request->ajax()) {
    Approval::where('id',$request->input("appId"))->update(['status'=>'PayGo']);
    return response([
      'status'=>"success",
    ]);
  }
}

public function meetup(Request $request)
{
  $this->validate($request,[
    'appId'=>'required',
    'date'=>'required',
    'time'=>'required',
    '_token'=>'required',
  ]);
  if ($request->ajax()) {
    Received::where('approval_id',$request->input("appId"))->update([
      'meetup_date'=>$request->input("date"),
      'meetup_time'=>$request->input("time")
    ]);
    Approval::where('id',$request->input("appId"))->update(['status'=>'MeetUp']);
    return response([
      'status'=>"success",
    ]);
  }
}


}
