@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <div class="d-flex justify-content-between align-items-baseline">
            <h4>Services</h4>
            <a href="{{ route('services.create') }}">Add New Service</a>
        </div>

        @if($services->count())
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->description }}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('services.edit', $service) }}"><i
                                        class="fa fa-pencil-alt"></i></a>
                                <a class="btn btn-sm btn-primary ml-1" href="{{ route('services.show', $service) }}"><i
                                        class="fa fa-eye"></i></a>
                                <form action="{{ route('services.destroy', $service) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm ml-1" type="submit"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <div>You have not added services</div>
        @endif
    </div>
@endsection
