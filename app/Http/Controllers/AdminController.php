<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Approval;
use App\Received;
use App\HelperController;

use Auth;


class AdminController extends Controller
{



     public function login()
     {
         return view('admin/login');
     }

     // user dashboard view
     // State ['Pending','Received','Approved',Completed]
     public function dashboard()
     {

       //$approved=User::find(1)->applications->where("status","Approved");
       $applications=User::find(auth()->user()->id)->applications()->orderBy('created_at','desc')->paginate(12);
       return view("admin/dashboard")->with([
         "applications"=>$applications,
       ]);
     }

     public function apply()
     {
       $applications=User::find(auth()->user()->id)->applications()->orderBy('created_at','desc')->paginate(12);
       return view("admin/apply")->with([
          "applications"=>$applications,
       ]);
     }




     public function profile($user,HelperController $helper)
     {
       $applications=User::find(auth()->user()->id)->applications()->orderBy('created_at','desc')->paginate(12);
       //dd($helper->adminCheck(auth()->user()->id));
       if (isset($_GET['edit'])) {
         return view("admin/profile")->with([
            "applications"=>$applications,
            "edit"=>true,
            'role'=>$helper->adminCheck(auth()->user()->id),

         ]);
       }
       return view("admin/profile")->with([
          "applications"=>$applications,
          "edit"=>false,
          'role'=>$helper->adminCheck(auth()->user()->id),
       ]);
     }

     public function appDetails(Request $request,$id,HelperController $helper)
         {
           $appDetails=Approval::findOrFail($id);
           if ($request->Ajax()) {
             return response()->json(['success'=>true,'status'=>$appDetails->status]);
           }
           $received=Received::where('approval_id',$appDetails->id)->first();
           return view('admin/appDetail')->with([
             'appDetails'=>$appDetails,
             'received'=>$received,
             'role'=>$helper->adminCheck(auth()->user()->id),

           ]);
         }

         public function appEdit($id,HelperController $helper)
         {
           $application=Approval::findOrFail($id);
           $received=Received::where('approval_id',$application->id)->first();
           if (auth()->user()->id ==$application->user_id) {
             return view('admin/appDetail')->with([
                'appDetails'=>$application,
                'role'=>$helper->adminCheck(auth()->user()->id),
                'received'=>$received,
                'edit'=>true

             ]);
           }

         }



     // director dashboar view


     public function director()
     {
       $applications=User::find(1)->applications()->orderBy('created_at','desc')->get();
       return view("admin/director/dashboard")->with([
         "applications"=>$applications,
       ]);
     }

     // Area officer dashboard view


     public function areaOfficer()
     {
       $lga=User::find(auth()->user()->id)->lga()->get();
       $applications=Approval::orderBy('created_at','desc')->where('lga',$lga[0]->name)->paginate(12);
       //$approved=User::find(1)->applications->where("status","Approved");
       return view("admin/areaOfficer/dashboard")->with([
         "applications"=>$applications,
       ]);
     }


     //  inspector dashboar view


     public function inspector()
     {
       return view("admin/dashboard");
     }

     public function update(Request $request)
     {
      $this->validate($request, [
           'lga' => 'required|string|max:255',
           'fullname' => 'required|string|max:255',
           'username' => 'required|unique:users,username,'.auth()->user()->id,
           'pNumber' => 'required|string|max:255',
           'email' => 'required|unique:users,email,'.auth()->user()->id,
       ]);

       // Handle file Audio Upload
       if ($request->hasFile('profile_pic')) {
       $fileWiithExt=$request->file('profile_pic')->getClientOriginalName();

       $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
       //get extension only
       $fileEx=$request->file('profile_pic')->getClientOriginalExtension();
       // file name to store
       $fileNametoStore=$fileName.'_'.time().'.'.$fileEx;
       // upload image
       $path=$request->file('profile_pic')->storeAs("public/uploads/images",$fileNametoStore);
       }

       $user=User::findOrFail(auth()->user()->id);
       $user->username=$request->input("username");
       $user->fullname=$request->input("fullname");
       $user->pNumber=$request->input("pNumber");
       $user->email=$request->input("email");
       $user->lga=$request->input("lga");
       if ($request->hasFile('profile_pic')) {
         $user->profile_pic=$fileNametoStore;
       }
       $user->save();

       return redirect()->back()->with('success', 'Success::Profile Updated');
     }

     

}
