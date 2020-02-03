@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 pt-2">
                    <div class="card shadow">
                        <img class="w-100 card-img-top" src="{{ $product->image->url }}" alt="Product Image" />
                        <div class="card-body">
                            <div class="card-text">
                                <a href="{{ route('products.show', $product) }}" class="card-title"><h4>{{ $product->name }}</h4></a>
                                <div class="d-flex justify-content-between">
                                    <span>{{ \Illuminate\Support\Str::limit($product->category->name, 16) }}</span>
                                    <span class="text-primary">KES {{ number_format($product->cost, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
