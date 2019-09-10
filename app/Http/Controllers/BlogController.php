<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPost=BlogPost::where("type","news")->orWhere("type","fund-raise")->orderBy('created_at','desc')->paginate(3);
        return view('blog/blog')->with('blogPosts',$blogPost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
       {
         $this->validate($request,[
           'title'=>'required',
           'body'=>'required',
           'category'=>'required',
           'user_type'=>'required',
           'preview_image'=>'nullable|image|max:2999',
       ]);

   // Handle file Audio Upload
     if ($request->hasFile('preview_image')) {
           $fileWiithExt=$request->file('preview_image')->getClientOriginalName();

           $fileName=pathinfo($fileWiithExt,PATHINFO_FILENAME);
           //get extension only
           $fileEx=$request->file('preview_image')->getClientOriginalExtension();
           // file name to store
           $fileNametoStore=$fileName.'_'.time().'.'.$fileEx;
           // upload image
           $path=$request->file('preview_image')->storeAs("public/uploads/images",$fileNametoStore);
        }
   else {
          $fileNametoStore='default.jpg';
        }
           //Create New Post
           $post= new BlogPost();
           $post->title=$request->input('title');
           $post->slug=str_slug($request->input('title'),'-');
           $post->body=$request->input('body');
           $post->category=$request->input('category');
           $post->preview_image=$fileNametoStore;
           $post->user_type=$request->input('user_type');

           $post->save();
           return redirect('/admin/dashboard')->with('success', 'Post Created');

   }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $blogPost=BlogPosts::where("slug",$slug)->firstOrFail();
      return view('blog/single-blog')->with('blogPost',$blogPost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
