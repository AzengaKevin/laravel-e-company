@extends('layouts.room')

@section('content')

    <div class="container pt-4">
        <div>
            <h5>Name</h5>
            <p class="text-muted">{{ $category->name }}</p>
        </div>
        <div>
            <h5>Description</h5>
            <p class="text-muted">{{ $category->description }}</p>
        </div>

        <div class="clearfix py-3">
            <a class="btn btn-outline-primary float-right px-5" href="{{ route('categories.edit', $category) }}">Edit</a>
        </div>
    </div>

@endsection
