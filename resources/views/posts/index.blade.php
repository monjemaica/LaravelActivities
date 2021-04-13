@extends('layouts.app')

@section('content')
    @auth
    
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
                        <td>{{ $post['id'] }}</td>
                        <td>{{ $post['Title'] }}</td>
                        <td>{{ $post['Description'] }}</td>
                        <td>
                            <form action="{{ route('posts.destroy', $post['id'] ) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('posts.show',$post['id']) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('posts.edit',$post['id'] ) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endauth


@endsection

<script>
    var app = @json($posts);
    console.log(app);
</script>