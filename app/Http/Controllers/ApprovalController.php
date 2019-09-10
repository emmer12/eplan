<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approvalAction(Request $request)
    {
      $action=$request->input('action');
      if ($action=="Received") {
        dd("sgfdhgh")
      }
      elseif ($action=="Approved") {
        dd("approving");
      }
      else{
        dd("Disapproving...");
      }
    }
}
