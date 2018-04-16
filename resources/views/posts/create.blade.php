
@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    
    {!! Form::open(array('action' => 'PostsController@store', 'method' => 'post')) !!}
    <div class='form-group'>
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Body Text'])}}
    </div>
    <div class='form-group'>
        {{Form::label('body','Body')}}
        {{Form::text('body','',['class'=>'form-control','placeholder'=>'Body Text'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-default'])}}
    {!! Form::close() !!}
        

@endsection