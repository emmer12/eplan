<?php

namespace App;

use Illuminate\Http\Request;

class HelperController
{
  public function adminCheck($userId)
  {
    if ($userId) {
      $access=User::find($userId)->access;
      foreach ($access as $i =>$roles) {
        if ($roles->name=="Director") {
          return "Director";
        }
        elseif ($roles->name=="AreaOfficer") {
          return "AreaOfficer";
        }
        elseif ($roles->name=="InspectionOfficer") {
          return "InspectionOfficer";
        }
        else {
          return false;
        }
      }
    }
  }

  public function userAdminCheck($userId)
  {
    if ($userId) {
      $access=User::find($userId)->access;
      foreach ($access as $i =>$roles) {
        if ($roles->name=="Admin" || $roles->name=="Admin") {
          return true;
        }
        else {
          return false;
        }
      }
    }
  }

}
