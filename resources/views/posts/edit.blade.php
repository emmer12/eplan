@extends('layouts.app')

@section('content')
  <div class="create">
    <h4>Create Post</h4>
     {!! Form::open(['action'=>['PostController@update',$post->id],'method'=>'POST'])!!}
       <div class="form-group">
         {{Form::label('title','Title')}}
         {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
       </div>
       <div class="form-group">
         {{Form::label('body','Body')}}
         {{Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Body'])}}
         {{Form::hidden('_method','PUT')}}
       </div>
       {{Form::submit('Submit',['class'=>'waves-effect waves-light btn-flat grey'])}}
      {!! Form::close() !!}
  </div>
  @endsection
