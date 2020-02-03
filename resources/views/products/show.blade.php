@extends('layouts.app')

@section('content')

    <div class="container pt-4">
        <h4>{{ $product->name }}</h4>

        <div class="row pt-4">
            <div class="col-md-4">
                <img class="w-100" src="{{ $product->image->url }}" alt="Product Image">
            </div>
            <div class="col-md-8">
                <div>
                    <h5>Category</h5>
                    <p class="text-muted">{{ $product->category->name }}</p>
                </div>
                <div>
                    <h5>Cost</h5>
                    <p class="text-muted">{{ 'KES ' . number_format($product->cost, 2) }}</p>
                </div>
                <div>
                    <h5>Description</h5>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
