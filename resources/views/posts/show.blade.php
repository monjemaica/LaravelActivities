@extends('layouts.app')

@section('content')

    @auth

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                            </div>
                            <div class="pull-left">
                                <h2> Show Task ID: {{ $post->id }}</h2>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {{ $post->Title }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {{ $post->Description }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Created At:</strong>
                                {{ $post->created_at }}
                                <img src="{{ asset('storage/img/' . $post->img . '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endauth

@endsection
