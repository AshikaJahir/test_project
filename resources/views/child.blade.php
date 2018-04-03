<html>

@extends('layouts.app')<!-- Mentions which layout should be used-->

@section('title', 'test Project')

@section('sidebar')
    @parent <!-- To include the parent content-->

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content from child class.</p>
    <p>This is to explore about extends directive</p>
    
@endsection

</html> <!-- html tags need not require because, they are already present in the parent classs-->