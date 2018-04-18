
@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
        @if(count($posts)>= 1)
            @foreach($posts as $post)
            <div class = "well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style = "width:35%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>  
                    </div>
                    
                </div>
                
            </div>
            @endforeach
        @else
            <p>No posts Found</p>
        @endif
<a href="{{$_SERVER['REQUEST_URI']}}/create"> Create Posts</a>

@endsection