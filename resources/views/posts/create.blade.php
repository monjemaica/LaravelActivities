@extends('layouts.app')

@section('content')

    @auth

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add New Post</div>

                        <div class="card-body">

                            <form method="POST" action="{{route('posts.store')}}">
                                @csrf
                                <div class="form-group">
                                <label for="formGroupExampleInput">Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description:</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
                                <br>
                                <input type="submit" class="btn button btn-success">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endauth

@endsection