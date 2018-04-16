
@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
        @if(count($posts)>= 1)
            @foreach($posts as $post)
            <div class = "well">
                <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
            </div>
            @endforeach
        @else
            <p>No posts Found</p>
        @endif
<a href="{{$_SERVER['REQUEST_URI']}}/create"> Create Posts</a>

@endsection