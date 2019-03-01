@extends('layouts.app')

  @section('content')
  <br>
  <a href="/posts" class="btn waves-effect waves-black grey">Go Back</a>
       <h4>posts</h4>
         <?php if (count($post)<=0): ?>
           <div class="alert alert-warning" role="alert">
             No post found
           </div>
           <?php else: ?>
             <div class="well post{{$post->id}}">
               <h5>{{$post->title}}</h5>
               <div class="">
                 {{$post->body}}
               </div>
               <hr>
               <small>written on {{$post->created_at}}</small>
            <hr>
            <a href="/posts/{{$post->id}}/edit" class="btn waves-effect">Edit</a>
            <button type="button" class=" btn waves-effect waves-light red delete_post" data-id="{{$post->id}}">Delete</button>
             </div>

           <?php endif; ?>
  @endsection
