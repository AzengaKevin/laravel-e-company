@extends('layouts.room')

@section('content')
    <div class="container pt-4">

        @if($users->count())
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Contact</th>
                        <th>Avatar</th>
                        <th>Join Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role() }}</td>
                            <td>{{ $user->profile->username ?? 'Not Set' }}</td>
                            <td>{{ $user->profile->contact ?? 'Not Set' }}</td>
                            <td>
                                <img width="96" height="96"
                                     class="rounded-circle img-thumbnail" src="{{ $user->avatar() }}"
                                     alt="User Avatar"/></td>
                            <td>{{ $user->create_at ?? now() }}</td>
                            <td class="d-flex align-items-start justify-content-center">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm ml-2" type="submit">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="font-weight-bold">No users registered yet</p>
        @endif
    </div>
@endsection
