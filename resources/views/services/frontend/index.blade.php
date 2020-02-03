@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4">
        @if($services->count())

            @foreach($services as $index => $service)
                <div class="service pt-4">
                    <div class="row {{ $index % 2 == 1 ? 'flex-row-reverse' : ''}}">
                        <div class="col-md-6">
                            <img src="{{ $service->image->url }}" alt="{{ $service->title }}" class="w-100 rounded">
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-around">
                            <h3 class="font-weight-bold text-center">{{ $service->title }}</h3>

                            <div class="px-4 text-center">
                                <p style="font-size: 1.15rem;">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Services Added yet</p>
        @endif
    </div>
@endsection
