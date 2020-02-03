@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>Add New Product</h4>
        <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Enter Name Here..."
                       aria-describedby="nameHelp"
                       value="{{ old('name') }}"/>
                <small id="nameHelp"
                       class="text-muted">Uniquely identifies the product in question.</small>
                @error('name')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="text" name="cost" id="cost"
                       class="form-control @error('cost') is-invalid @enderror"
                       placeholder="Enter Cost Here..."
                       aria-describedby="costHelp"
                       value="{{ old('cost') }}"/>
                <small id="costHelp"
                       class="text-muted">States the cost of the product in question.</small>
                @error('cost')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                          class="form-control @error('description') is-invalid @enderror"
                          placeholder="Enter Description Here..."
                          rows="5"
                          aria-describedby="descriptionHelp">{{ old('description') }}</textarea>
                <small id="descriptionHelp"
                       class="text-muted">States the description of the product in question.</small>
                @error('description')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select type="text" name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror"
                        aria-describedby="category_idHelp">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <small id="category_idHelp"
                       class="text-muted">In which category does the product in question belong.</small>
                @error('category_id')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <input type="file" name="image" id="image" aria-describedby="imageHelp"
                       class="form-control-file @error('image') is-invalid @enderror"/>
                <small id="imageHelp"
                       class="text-muted">A sample image for the product in question.</small>
                @error('image')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="clearfix">
                <button class="btn btn-primary float-right" type="submit">Add Product</button>
            </div>
        </form>
    </div>
@endsection
