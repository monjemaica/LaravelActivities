@extends('layouts.app')



@section('content')

    @auth
        <a class="btn button btn-success" href="/posts">Create New Post</a>
    @endauth
    
@endsection
