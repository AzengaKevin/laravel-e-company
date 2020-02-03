@extends('layouts.room')

@section('content')
    <div class="container pt-4">

        <div class="d-flex justify-content-between align-items-baseline">
            <h4>Posts</h4>
            <a href="{{ route('posts.create') }}">Create Post</a>
        </div>

        @if($posts->count())
            <div class="table-responsive-sm">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <img class="rounded-circle img-thumbnail" width="96" height="96" src="{{ $post->image->url }}" alt="">
                            </td>
                            <td>{{ $post->description }}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.edit', $post) }}"><i
                                        class="fa fa-pencil-alt"></i></a>
                                <a class="btn btn-sm btn-primary ml-1" href="{{ route('posts.show', $post) }}"><i
                                        class="fa fa-eye"></i></a>
                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm ml-1" type="submit"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <div>You have not created any posts</div>
        @endif
    </div>
@endsection
