<?php

namespace App\Http\Controllers;
use App\Payment;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
      if ($request->input("type")=="offline") {
        $this->validate($request,[
          'pReceipt'=>'required|image|max:2999',
        ]);

        if ($request->hasFile('pReceipt')) {
          $fileWiithExt=$request->file('pReceipt')->getClientOriginalName();
          $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
          //get extension only
          $fileEx=$request->file('pReceipt')->getClientOriginalExtension();
          // file name to store
          $fileNametoStore = $fileName.'_'.time().'.'.$fileEx;
          // upload image
          $path=$request->file('pReceipt')->storeAs("public/uploads/receipts",$fileNametoStore);
        }
       $payment= new Payment();
       $payment->type=$request->input('type');
       $payment->approvals_id=$request->input('appId');
         if ($request->hasFile('pReceipt')){
           $payment->upload_url=$fileNametoStore;
         }

       $payment->save();
       return redirect()->back()->with("msg","Reciept Sent");

      }
    }
}
