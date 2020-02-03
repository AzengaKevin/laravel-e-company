@extends('layouts.app')

@section('content')

    <div class="container pt-4">
        <h2>{{ $post->title }}</h2>
        @if($post->image)
            <img class="w-100" src="{{ $post->image->url }}" alt="Post Image"/>
        @endif
        <div class="pt-3"><p>{{ $post->body }}</p></div>

        <div class="clearfix py-1">
            <button type="submit" class="btn btn-danger ml-2 float-right">Delete Post</button>
            <a href="{{ route('posts.edit', $post) }}" type="submit" class="btn btn-primary float-right">Edit Post</a>
        </div>

        <div class="comments">
            <h4 class="py-2">Comments</h4>
            <div>
                @foreach($post->comments as $comment)
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img width="64" height="64" class="rounded-circle img-thumbnail"
                                 src="{{ $comment->user->avatar() }}"
                                 alt="Comment Author">
                        </div>
                        <div class="col-md-10">
                            <div>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

        <div>
            <h4>Post Comment</h4>
            <form action="{{ route('comments.store', $post) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body"
                              rows="5" class="form-control @error('body') is-invalid @enderror"
                              aria-describedby="bodyHelp"
                              placeholder="Comment Body ...">{{ old('body') }}</textarea>
                    <small id="bodyHelp" class="text-muted">Type a good relevant comment about the post</small>
                    @error('body')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="py-2">
                    <button class="btn btn-primary btn-sm px-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
