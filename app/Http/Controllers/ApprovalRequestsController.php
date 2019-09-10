<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approval;

class ApprovalRequestsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  // Insert Building Plan Approval Request


  public function applyApproval(Request $request)
  {
    $this->validate($request,[
      'name'=>'required',
      'lga'=>'required',
      'location'=>'required',
      'user_id'=>'required',
      'type'=>'required',
      'site_plan'=>'required|image|max:2999',
      'location_plan'=>'required|image|max:2999',
      'floor_plan'=>'required|image|max:2999',
      'front_elevation'=>'required|image|max:2999',
      'rear_elevation'=>'required|image|max:2999',
      'side_elevaton'=>'required|image|max:2999',
      'roof_plan'=>'required|image|max:2999',
      'additional_doc.*'=>'image|max:2999',
]);
$field=['site_plan','location_plan','floor_plan','front_elevation','rear_elevation','side_elevaton','roof_plan'];
for ($i=0; $i < 7; $i++) {
  if ($request->hasFile($field[$i])) {
    $fileWiithExt=$request->file($field[$i])->getClientOriginalName();
    $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
    //get extension only
    $fileEx=$request->file($field[$i])->getClientOriginalExtension();
    // file name to store
    $fileNametoStore = $fileName.'_'.time().'.'.$fileEx;
    // upload image
    $path=$request->file($field[$i])->storeAs("public/uploads/workingDrawings",$fileNametoStore);
    $allFiles[]=$fileNametoStore;
  }
}
// Handle file Upload

if ($request->hasFile('additional_doc')) {
       foreach($request->file('additional_doc') as $file)
            {
              $fileWiithExt=$file->getClientOriginalName();
              $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
              $fileEx=$file->getClientOriginalExtension();
              $fileNametoStore2=$fileName.'_'.time().'.'.$fileEx;
              $path=$file->storeAs("public/uploads/images",$fileNametoStore2);
                $data[] = $fileNametoStore2;
            }
        }
    //Create New Post
      $approve= new Approval();
      $approve->name=$request->input('name');
      $approve->lga=$request->input('lga');
      $approve->slug=str_slug($request->input('name'),'-').'-'.rand(1000,2);
      $approve->location=$request->input('location');
      $approve->type=$request->input('type');
      $approve->user_id=$request->input('user_id');
      $approve->site_plan=$allFiles[0];
      $approve->location_plan=$allFiles[1];
      $approve->floor_plan=$allFiles[2];
      $approve->front_elevation=$allFiles[3];
      $approve->rear_elevation=$allFiles[4];
      $approve->side_elevation=$allFiles[5];
      $approve->roof_plan=$allFiles[6];
      $approve->save();
      return redirect('/dashboard')->with('success', 'Post Created');

      }

      public function Store_file($file,$request)
      {
        if ($request->hasFile($file)) {
          $fileWiithExt=$request->file($file)->getClientOriginalName();
          $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
          //get extension only
          $fileEx=$request->file($file)->getClientOriginalExtension();
          // file name to store
          $fileNametoStore = $fileName.'_'.time().'.'.$fileEx;
          // upload image
          $path=$request->file($file)->storeAs("public/uploads/workingDrawings",$fileNametoStore);

          return $this->filename = $fileNametoStore;
        }
      }


      // Edit Application


      public function editApproval(Request $request,$id)
      {
        $this->validate($request,[
          'name'=>'required',
          'lga'=>'required',
          'location'=>'required',
          'user_id'=>'required',
          'type'=>'required',
    ]);

    //Create New Post
      $approve=  Approval::findOrFail($id);

      if (auth()->user()->id==$approve->user_id) {
        $this->Store_file('site_plan',$request);
        $this->Store_file('location_plan',$request);
        $this->Store_file('floor_plan',$request);
        $this->Store_file('front_elevation',$request);
        $this->Store_file('rear_elevation',$request);
        $this->Store_file('side_elevaton',$request);
        $this->Store_file('roof_plan',$request);

        // Handle file Upload

        if ($request->hasFile('additional_doc')) {
               foreach($request->file('additional_doc') as $file)
                    {
                      $fileWiithExt=$file->getClientOriginalName();
                      $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
                      $fileEx=$file->getClientOriginalExtension();
                      $fileNametoStore2=$fileName.'_'.time().'.'.$fileEx;
                      $path=$file->storeAs("public/uploads/images",$fileNametoStore2);
                        $data[] = $fileNametoStore2;
                    }
                }


              $approve->name=$request->input('name');
              $approve->lga=$request->input('lga');
              $approve->slug=str_slug($request->input('name'),'-').'-'.rand(1000,2);
              $approve->location=$request->input('location');
              $approve->type=$request->input('type');
              $approve->user_id=$request->input('user_id');

              $field=['site_plan','location_plan','floor_plan','front_elevation','rear_elevation','side_elevaton','roof_plan'];
              if ($request->hasFile('site_plan')) {
                  $approve->site_plan=$this->filename;
              }
              if ($request->hasFile('location_plan')) {
                  $approve->location_plan=$this->filename;
              }
              if ($request->hasFile('floor_plan')) {
                  $approve->floor_plan=$this->filename;
              }
              if ($request->hasFile('front_elevation')) {
                  $approve->front_elevation=$this->filename;
              }
              if ($request->hasFile('rear_elevation')) {
                  $approve->rear_elevation=$this->filename;
              }
              if ($request->hasFile('side_elevaton')) {
                  $approve->side_elevaton=$this->filename;
              }
              if ($request->hasFile('roof_plan')) {
                  $approve->roof_plan=$this->filename;
              }



              $approve->save();
              return redirect()->back()->with('success', 'Success::Application has been updated Successfully');
            }else {
              return redirect()->back()->with('error', 'Error::Opps!!,something went wrong');
            }

          }



  // Get ALl Application

  public function getAll(Request $request)
  {
    if ($request->ajax()) {
      $app=Approval::get();
      return $app;
    }
  }
  // Get single Application
}
