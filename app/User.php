<?php

namespace App;
use Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname','type','title','lga','pNumber','username','isComfermed', 'email', 'password','confirmation_token',
    ];


    public function applications()
    {
        return $this->hasMany('App\Approval');
    }

    public function roleRedirect($user)
    {
        return Auth::user()->roles()->where('name',$user)->first();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Roles','user_roles','user_id','role_id');
    }

    public function hasAnyRole($roles)
    {
      if (is_array($roles)) {
        foreach ($roles as $role) {
          if ($this->hasRole($role)) {
            return true;
          }
        }
      }
      else {
        if ($this->hasRole($roles)) {
          return true;
        }
      }
    }

    public function hasRole($role)
    {
      if ($this->roles()->where('name',$role)->first()){
        return true;
      }
      return false;
    }


    public function access()
    {
        return $this->belongsToMany('App\Roles','user_roles','user_id','role_id');
    }
    public function lga()
    {
        return $this->hasOne(LocalGovernment::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
