<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Change table Name
    protected $table='posts';
    // Primary key
    public $primaryKey='id';
    //Timestamp
    public $timestamps=true;
}
