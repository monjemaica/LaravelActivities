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
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if ($post->img != '')
                                    <strong>Image:</strong>
                                    <img class="img-fluid" src="{{ asset('storage/img/' . $post->img) }}">
                                @endif
                            </div>
                        </div>

                        @if ($comments)

                            @foreach ($comments as $comment)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="display-comment">

                                        <div class="media">
                                            <img class="mr-3" src="http://placekitten.com/60/60" alt="">
                                            <div class="media-body">
                                                <h5 class="mt-0">Commented By:</h5>
                                                <p>{{ $comment->description }}</p>

                                                <div class="media mt-3">
                                                    <a class="pr-3" href="" id="reply"></a>
                                                    <div class="media-body">
                                                        {{-- <h5 class="mt-0">Media heading</h5>
                                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                        sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                                        condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. --}}
                                                        <form method="post" action="{{ route('comments.store') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" name="description" class="form-control" />
                                                                <input type="hidden" name="post_id"
                                                                    value="{{ $comment->post_id }}" />
                                                                <input type="hidden" name="parent_id"
                                                                    value="{{ $comment->id }}" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-warning" value="Reply" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>



                                    </div>
                                </div>
                            @endforeach

                        @endif



                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"> <strong>Comment:</strong></label>
                                    <textarea class="form-control" name="description" id="description" rows="3" cols="100"
                                        placeholder="Enter comments"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn button btn-success" value="Add Comment">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endauth

@endsection
