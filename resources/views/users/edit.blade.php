@extends('layouts.room')

@section('content')
    <div class="container pt-4">
        <h4>Edit User</h4>

        <form action="{{ route('users.update', $user) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-4">Name</div>
                <div class="col-md-7 offset-md-1 text-primary">{{ $user->name }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">Username</div>
                <div class="col-md-7 offset-md-1 text-primary">{{ $user->profile->username ?? 'Not Set' }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">Contact</div>
                <div class="col-md-7 offset-md-1 text-primary">{{ $user->profile->contact ?? 'Not Set' }}</div>
            </div>

            <div class="form-group form-check pt-2">
                <input type="checkbox" class="form-check-input" name="admin" id="admin"
                       @if($user->admin) checked @endif>
                <label class="form-check-label" for="admin">Mark as Admin</label>
            </div>

            <div class="clearfix py-3">
                <button type="submit" class="btn btn-primary float-right">Update User</button>
            </div>

        </form>
    </div>
@endsection
