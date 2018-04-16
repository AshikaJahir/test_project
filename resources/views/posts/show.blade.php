
@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <small>Written on {{$post->created_at}}</small>
    <div>{{$post->body}}</div>
      
   <a href="{{$_SERVER['REQUEST_URI']}}/edit"> Edit Post</a>
   
   {!! Form::open(array('action' => ['PostsController@destroy',$post->id], 'method' => 'POST')) !!}
   {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
   {!!Form::close()!!}
                  

@endsection