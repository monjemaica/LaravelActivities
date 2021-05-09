@extends('layouts.app')

@section('content')

    @auth

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add New Post</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Title:</label>
                                    <input id="Title" type="text" class="form-control" name="Title" @error('title') is-invalid
                                        @enderror" name="title" value="{{ old('Title') }}" required autofocus>

                                    @error('Title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description:</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="Description"
                                        value="{{ old('Description') }}" rows="3" placeholder="Enter Description" required
                                        autocomplete="Description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="img">{{ __('Image') }}</label>

                                        <div>
                                            <input type="file" class="form-control @error('img') is-invalid @enderror"
                                                name="img" autocomplete="img">

                                            @error('img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
