@extends('layouts.room')

@section('content')

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4 class="pt-2">Edit Profile</h4>

                <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                               value="{{ old('name') ?? $user->name }}"
                               placeholder="Enter Name Here..."
                               class="form-control @error('name') is-invalid @enderror">
                        <small class="text-muted">Your Display Name</small>
                        @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                               value="{{ old('username') ?? $user->profile->username }}"
                               placeholder="Enter Username Here..."
                               class="form-control @error('username') is-invalid @enderror">
                        <small class="text-muted">Your Display Name</small>
                        @error('username')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" name="contact" id="contact"
                               value="{{ old('contact') ?? $user->profile->contact }}"
                               placeholder="Enter Contact Here..."
                               class="form-control @error('contact') is-invalid @enderror">
                        <small class="text-muted">Your Display Name</small>
                        @error('contact')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bio">Biography</label>
                        <textarea type="text" name="bio" id="bio"
                                  placeholder="Enter Contact Here..." rows="5"
                                  class="form-control @error('bio') is-invalid @enderror">
                            {{ old('bio') ?? $user->profile->bio }}
                        </textarea>
                        <small class="text-muted">Your Display Name</small>
                        @error('bio')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">User Avatar</label>
                        <input type="file" name="image" id="image"
                               class="form-control-file @error('image') is-invalid @enderror">
                        <small class="text-muted">Your Display Name</small>
                        @error('image')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="clearfix my-3">
                        <button class="btn btn-success float-right px-5" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
