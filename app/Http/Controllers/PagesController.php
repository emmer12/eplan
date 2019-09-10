<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class PagesController extends Controller
{
    public function home()
    {
      //$blogPosts=BlogPost::orderBy('created_at','desc')->take(3)->get();
      return view("pages.index");
    }

    public function about()
    {
      return view("pages.about");
    }

    public function contact()
    {
      return view("pages.contact");
    }

}
