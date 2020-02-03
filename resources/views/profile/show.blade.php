@extends('layouts.room')

@section('content')

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4 class="pt-2">Profile</h4>

                <div class="row">
                    <div class="col-md-8">

                        <div class="pt-4">
                            <h6 class="text-muted">Full Name</h6>
                            <div class="text-primary">{{ $user->name }}</div>
                        </div>

                        <div class="pt-4">
                            <h6 class="text-muted">Username</h6>
                            <div class="text-primary">{{ $user->profile->username ?? 'Add Username' }}</div>
                        </div>

                        <div class="pt-4">
                            <h6 class="text-muted">Contact</h6>
                            <div class="text-primary">{{ $user->profile->contact ?? 'Add Contact' }}</div>
                        </div>

                        <div class="pt-4">
                            <h6 class="text-muted">Bio</h6>
                            <div class="text-primary">{{ $user->profile->bio ?? 'Add Biography' }}</div>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex flex-column align-items-center">
                        <img class="w-100 rounded-circle img-thumbnail" src="{{ $user->profile->photoUrl() }}"
                             alt="User Avatar">
                    </div>

                    <a href="{{ route('profile.edit') }}" class="btn btn-block btn-success mt-4">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection
