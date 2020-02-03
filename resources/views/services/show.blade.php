@extends('layouts.room')

@section('content')

    <div class="container pt-4">
        <h4>{{ $service->title }}</h4>

        <div class="row align-items-center pt-4">
            <div class="col-md-6"><img class="w-100" src="{{ $service->image->url }}" alt="Service Image"></div>
            <div class="col-md-6">{{ $service->description }}</div>
        </div>

        <div class="clearfix py-3 float-right">
            <a href="{{ route('services.edit', $service) }}" class="btn btn-outline-primary float-right px-5">Edit</a>
        </div>
    </div>
@endsection
