<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Approval;

class ApprovalController extends Controller
{
    public function approvalAction(Request $request)
    {
      $action=$request->input('action');
      if ($action=="Received") {
        dd("sgfdhgh");
      }
      elseif ($action=="Approved") {
        dd("approving");
      }
      else{
        dd("Disapproving...");
      }
    }

    public function approve(Request $request)
    {
      if ($request->ajax()) {
        Approval::where('id',$request->input("appId"))->update(['status'=>'Approved']);
        $app=Approval::where('id',$request->input("appId"))->first();
        $site_plan=$app->site_plan;
        $location_plan=$app->location_plan;
        $floor_plan=$app->floor_plan;
        $front_elevation=$app->front_elevation;
        $rear_elevation=$app->rear_elevation;
        $side_elevation=$app->side_elevation;
        $roof_plan=$app->roof_plan;

        $img = Image::make('storage/uploads/workingDrawings/'.$site_plan)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$site_plan);
        $img = Image::make('storage/uploads/workingDrawings/'.$location_plan)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$location_plan);
        $img = Image::make('storage/uploads/workingDrawings/'.$floor_plan)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$floor_plan);
        $img = Image::make('storage/uploads/workingDrawings/'.$front_elevation)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$front_elevation);
        $img = Image::make('storage/uploads/workingDrawings/'.$rear_elevation)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$rear_elevation);
        $img = Image::make('storage/uploads/workingDrawings/'.$side_elevation)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$side_elevation);
        $img = Image::make('storage/uploads/workingDrawings/'.$roof_plan)->resize(800, 400)->insert('images/approved1.png')->save('approvedPlan/'.$roof_plan);
        // Image::make('images/slider/3.jpg')->resize(300, 200)->save('bar.jpg');
        return response(['success'=>"application approved successfully"]);
      }
    }
}
