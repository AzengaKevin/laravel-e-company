@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <div class="d-flex justify-content-between">
            <h4>Adverts</h4>
            <a href="{{ route('adverts.create') }}">Create Advert</a>
        </div>

        @if($adverts->count())
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($adverts as $advert)
                        <tr>
                            <td>{{ $advert->id }}</td>
                            <td>{{ $advert->title }}</td>
                            <td><img class="rounded" width="200" height="150" src="{{ $advert->image->url }}"
                                     alt="Advert Image"></td>
                            <td>{{ $advert->description }}</td>
                            <td class="d-flex">
                                <a href="{{ route('adverts.show', $advert) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('adverts.destroy', $advert) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-2">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

