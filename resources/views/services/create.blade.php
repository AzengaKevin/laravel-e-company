@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>Add New Service</h4>
        @include('partials.feedback')
        <form action="{{ route('services.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" id="title"
                       class="form-control @error('title') is-invalid @enderror" required
                       placeholder="Enter Your Title Here">
                <small class="text-muted">The title of the particular service</small>
                @error('title')
                <small class="invalid-feedback"><strong>{{ $message }}</strong></small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                          class="form-control @error('description') is-invalid @enderror" required
                          rows="5"
                          placeholder="Enter The Description Here">
                    {{ old('description') }}
                </textarea>
                <small class="text-muted">The description of the particular service you are adding</small>
                @error('description')
                <small class="invalid-feedback"><strong>{{ $message }}</strong></small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
                <small class="text-muted">An elegant image to describe the service even more</small>
                @error('image')
                <small class="invalid-feedback"><strong>{{ $message }}</strong></small>
                @enderror
            </div>

            <div class="clearfix my-3">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>
@endsection
