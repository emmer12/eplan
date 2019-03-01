@extends('layouts.app')

  @section('content')
       <h4>All posts</h4>
       @if(count($posts) > 0)
         @foreach($posts as $post)
             <div class="well">
               <h5><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
               <small>written on {{$post->created_at}}</small>
             </div>
          @endforeach
          {{$posts->links()}}
         @else
            <p>No posts found</p>
       @endif
  @endsection
