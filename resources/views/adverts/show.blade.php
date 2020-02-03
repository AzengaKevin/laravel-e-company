@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>{{ $advert->title }}</h4>
        <div class="pt-2">
            <img class="w-100" src="{{ $advert->image->url }}" alt="Advert Image"/>
        </div>

        <div class="pt-2">
            <p>{{ $advert->description }}</p>
        </div>

        <div class="clearfix py-3 d-flex justify-content-end">
            <a href="{{ route('adverts.edit', $advert) }}" class="btn btn-primary px-2">Edit Advert</a>
            <form action="{{ route('adverts.destroy', $advert) }}" method="post">
                <button class="btn btn-danger ml-2" type="submit">Delete Advert</button>
            </form>
        </div>
    </div>
@endsection
