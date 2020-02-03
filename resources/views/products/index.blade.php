@extends('layouts.room')

@section('content')
    <div class="container pt-4">

        <div class="d-flex justify-content-between align-items-baseline">
            <h4>Products</h4>
            <a href="{{ route('products.create') }}">Add New Product</a>
        </div>

        @if($products->count())
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Cost</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->cost }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('products.edit', $product) }}"><i class="fa fa-pencil-alt"></i></a>
                                <a class="btn btn-sm btn-primary ml-1" href="{{ route('products.show', $product) }}"><i class="fa fa-eye"></i></a>
                                <form action="{{ route('products.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm ml-1" type="submit"><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <div>You have not added products</div>
        @endif
    </div>
@endsection
