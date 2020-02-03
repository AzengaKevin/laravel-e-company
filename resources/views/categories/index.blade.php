@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <div class="d-flex justify-content-between align-items-baseline">
            <h4>Categories</h4>
            <a href="{{ route('categories.create') }}">Add New Category</a>
        </div>

        @if($categories->count())
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('categories.edit', $category) }}"><i
                                        class="fa fa-pencil-alt"></i></a>
                                <a class="btn btn-sm btn-primary ml-1" href="{{ route('categories.show', $category) }}"><i
                                        class="fa fa-eye"></i></a>
                                <form action="{{ route('categories.destroy', $category) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm ml-1" type="submit"><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div>No product categories found</div>
        @endif

    </div>
@endsection
