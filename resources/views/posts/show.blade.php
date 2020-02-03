@extends('layouts.room')

@section('content')

    <div class="container pt-4">
        <h2>{{ $post->title }}</h2>
        @if($post->image)
            <img class="w-100" src="{{ $post->image->url }}" alt="Post Image"/>
        @endif
        <div class="pt-3"><p>{{ $post->body }}</p></div>

        <div class="clearfix py-3">
            <button type="submit" class="btn btn-danger ml-2 float-right">Delete Post</button>
            <a href="{{ route('posts.edit', $post) }}" type="submit" class="btn btn-primary float-right">Edit Post</a>
        </div>
    </div>
@endsection
