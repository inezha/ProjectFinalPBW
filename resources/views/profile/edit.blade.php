@extends('layouts.master')

@section('content')
    <h3>Halaman Edit Profile</h3>

    <form class="pt-3" method="POST" action="/profile/{{ $profile->id }}/{{ $profile->user_id }}">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ $profile->user->name }}" autocomplete="name" autofocus/>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ $profile->user->email }}" autocomplete="email"/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            
        </div>
        <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" autocomplete="new-password"/>
            <small id="emailHelp" class="form-text text-muted">Kosongkan password jika tidak ingin mengubah password</small>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirmation Password" name="password_confirmation" autocomplete="new-password">
        </div>

        <div class="form-group">
            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Age" value="{{ $profile->age }}" name="age" autocomplete="age"/>

            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" autocomplete="address">{{ $profile->address }}</textarea>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="mt-3">
            <button type="submit" class="btn btn-inverse-primary btn-fw">Save</button>
        </div>

    </form>
@endsection