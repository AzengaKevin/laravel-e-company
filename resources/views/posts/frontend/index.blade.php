@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block">Create Post</a>
                <a href="#" class="btn btn-link btn-block text-left">All Posts</a>
                <a href="#" class="btn btn-link btn-block text-left">Trending this week</a>
                <a href="#" class="btn btn-link btn-block text-left">Popular Posts</a>
                <a href="#" class="btn btn-link btn-block text-left">Not replied</a>
            </div>
            <div class="col-md-9">
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <img src="{{ $post->imageUrl() }}" class="w-100 rounded-circle" alt="Post Image">
                            </div>
                            <div class="col-md-8">
                                <a href="{{ $post->url() }}"><h4>{{ $post->title }}</h4></a>
                                <p>{{ Str::limit($post->body, 200) }}</p>

                                @if($post->comments->count())
                                    <div>
                                        <span
                                            class="text-primary text-uppercase">{{ $post->comments->first()->user->name}}</span>
                                        <span class="text-muted">replied</span>
                                        <span class="font-weight-bold">{{ now()->diff(new \Carbon\Carbon($post->comments->first()->created_at))->format('%h hrs :%I min :%s sec') }} minutes ago</span>
                                    </div>
                                @else
                                    <div>Be the first one to comment</div>
                                @endif
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-end">
                                <div class="text-muted">
                                    <span>{{ $post->views->count() }}</span>
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="text-muted ml-2">
                                    <span>{{ $post->comments->count() }}</span>
                                    <i class="fa fa-comment"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
