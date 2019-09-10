<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function application()
    {
      return $this->hasOne('App\Received');
    }

}
