@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>Create Advert</h4>
        @include('partials.feedback')
        <form action="{{ route('adverts.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                       class="form-control @error('title') is-invalid @enderror"
                       placeholder="Enter Name Here..."
                       aria-describedby="titleHelp"
                       value="{{ old('title') }}"/>
                <small id="titleHelp"
                       class="text-muted">Choose a very captivating title for the advert .</small>
                @error('title')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                          aria-describedby="descriptionHelp"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="5" placeholder="Enter Description Here...">{{ old('description') }}</textarea>
                <small id="descriptionHelp"
                       class="text-muted">Robust description of the advertisement you are creating</small>
                @error('description')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image"
                       class="form-control-file"
                       aria-describedby="imageHelp">
                <small class="text-muted" id="imageHelp">Quality more descriptive cool image about what you are
                    advertising</small>
                @error('image')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="cleafix py-3">
                <button class="btn btn-primary float-right" type="submit">Submit</button>
            </div>

        </form>
    </div>
@endsection
