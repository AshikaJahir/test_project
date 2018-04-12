

@extends('layouts.subpage')<!-- Mentions which layout should be used-->

@section('title', 'Register Form')

@section('sidebar')

@endsection

@section('content')

    <h2>{{ $exception->getMessage() }}</h2>
@endsection

<!-- html tags need not require because, they are already present in the parent classs-->