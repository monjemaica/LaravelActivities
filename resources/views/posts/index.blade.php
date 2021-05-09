@extends('layouts.app')

@section('content')
    @auth

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <a class="btn button btn-success" href="/posts/create">Create New Post</a>
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        {{-- <td>{{ $post['id'] }}</td>
                            <td>{{ $post['Title'] }}</td>
                            <td>{{ $post['Description'] }}</td> --}}
                                        <th scope="row">{{ $post->id }}</th>
                                        <td style="width: 25%">{{ $post->Title }}</td>
                                        <td style="width: 50%">{{ $post->Description }}</td>
                                        <td style="width: 35%">
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
                    Total # of Post: {{ $count }}
                </div>
            </div>
        </div>
    @endauth


@endsection

<script>
    var app = @json($posts);
    console.log(app);

</script>
