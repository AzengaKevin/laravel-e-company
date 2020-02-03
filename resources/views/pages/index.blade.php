@extends('layouts.app')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if($adverts->count())
                @foreach($adverts as $index => $advert)
                    <li data-target="#myCarousel" data-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"></li>
                @endforeach
            @endif
        </ol>
        <div class="carousel-inner">
            @if($adverts->count())
                @foreach($adverts as $index => $advert)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ $advert->image->url }}" alt="Advert Image">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1 class="font-weight-bold">{{ $advert->title }}</h1>
                                <p style="font-size: 1.25rem;">{{ $advert->description }}</p>
                                @guest
                                    <p><a class="btn btn-lg btn-outline-primary" href="{{ route('register') }}"
                                          role="button">Sign
                                            up today</a></p>
                                @else
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Get Started</a></p>
                                @endguest
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div id="team" class="container-fluid d-flex flex-column justify-content-around bg-white" style="min-height: 100vh">
        <h1 class="my-3 text-center font-weight-bold">Our Team</h1>
        <div class="row justify-content-around">

            @if($users->count())
                @foreach($users as $user)
                    <div class="col-md-4 p-4 d-flex flex-column align-items-center">
                        <img width="256" height="256" class="img-thumbnail rounded-circle" src="{{ $user->avatar() }}"
                             alt="Team Avatar"/>
                        <h4 class="mt-3">{{ $user->name }}</h4>
                        <div class="text-center px-3">{{ $user->profile->bio }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <div class="container-fluid">
        @if($service)
            <div class="service py-5">
                <h1 class="my-3 text-center font-weight-bold">Services</h1>

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ $service->image->url }}" alt="{{ $service->title }}" class="w-100 rounded">
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-around align-items-center">
                        <h3 class="font-weight-bold text-center">{{ $service->title }}</h3>

                        <div class="px-4 text-center">
                            <p style="font-size: 1.15rem;">{{ Str::limit($service->description, 320) }}</p>
                        </div>

                        <a href="{{ route('service.index') }}" class="btn btn-primary btn-lg">More Services</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="w-100 bg-white" style="min-height: 100vh;">
        @if($products->count())
            <div class="products py-4">
                <h1 class="my-3 text-center font-weight-bold">Products</h1>

                <div class="container-fluid">
                    <div class="row justify-content-around py-3">
                        @foreach($products as $product)
                            <div class="col-md-3 pt-2">
                                <div class="card shadow">
                                    <img class="w-100 card-img-top" src="{{ $product->image->url }}"
                                         alt="Product Image"/>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <a href="{{ route('products.show', $product) }}" class="card-title">
                                                <h4>{{ $product->name }}</h4></a>
                                            <div class="d-flex justify-content-between">
                                                <span>{{ \Illuminate\Support\Str::limit($product->category->name, 16) }}</span>
                                                <span
                                                    class="text-primary">KES {{ number_format($product->cost, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center py-5">
                    <a href="{{ route('items.index') }}" class="btn btn-primary btn-lg px-3">More Products</a>
                </div>

            </div>
        @endif
    </div>
@endsection
