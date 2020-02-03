@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>Edit Post</h4>

        <form action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelp"
                       value="{{ old('title') ?? $post->title }}"
                       placeholder="Title Here ...">
                <small class="text-muted" id="titleHelp">Choose a captivating title for your readers</small>
                @error('title')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" name="body" id="body" rows="5"
                          class="form-control @error('body') is-invalid @enderror" aria-describedby="bodyHelp"
                          placeholder="Title Here ...">{{ old('body') ?? $post->body }}</textarea>
                <small class="text-muted" id="bodyHelp">Post something exiting please</small>
                @error('body')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"
                       class="form-control-file"
                       aria-describedby="imageHelp">
                <small class="text-muted" id="imageHelp">Use an exiting image or something that matches your
                    post</small>
                @error('image')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="clearfix py-3">
                <button type="submit" class="btn btn-primary px-5 float-right">Update Post</button>
            </div>
        </form>
    </div>
@endsection
