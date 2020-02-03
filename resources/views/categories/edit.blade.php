@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>Edit Category</h4>

        <form action="{{ route('categories.update', $category) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter Name Here..."
                       aria-describedby="nameHelp"
                       value="{{ old('name') ?? $category->name }}"/>
                <small id="nameHelp"
                       class="text-muted">Will help users to filter the available products in the end.</small>
                @error('name')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                          aria-describedby="descriptionHelp"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="5"
                          placeholder="Enter Description Here...">{{ old('description') ?? $category->description }}</textarea>
                <small id="descriptionHelp"
                       class="text-muted">This describes the products to be stored in the above named category for
                    different admins</small>
                @error('description')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="cleafix">
                <button class="btn btn-primary float-right" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
