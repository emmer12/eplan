<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Received extends Model
{
    public function date()
    {
      return $this->hasOne('App\InspectionTime');
    }
}
