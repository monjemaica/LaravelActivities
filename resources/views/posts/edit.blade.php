@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">

                    <form method="POST" action="{{route('posts.update', $post->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="formGroupExampleInput">Title:</label>
                          <input type="text" name="Title" value="{{ $post->Title }}" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description:</label>
                          <textarea class="form-control" name="Description" rows="3" placeholder="Enter Description">{{ $post->Description }}</textarea>
                          <br>
                          <input type="submit" class="btn button btn-success">
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    var app = @json($post);
    console.log(app);
</script>