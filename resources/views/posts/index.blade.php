@extends('layouts.app')

@section('content')
    @auth

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a class="btn button btn-success" href="/posts/create">Create New Post</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    {{-- <td>{{ $post['id'] }}</td>
                        <td>{{ $post['Title'] }}</td>
                        <td>{{ $post['Description'] }}</td> --}}
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->Title }}</td>
                                    <td>{{ $post->Description }}</td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a class="btn btn-info" href="/posts/{{ $post->id }}">Show</a>
                                            <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endauth


@endsection

<script>
    var app = @json($posts);
    console.log(app);

</script>
