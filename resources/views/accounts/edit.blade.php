@extends('layouts.app')

@section('title')

    My account - Setting profile

@endsection

@section('content')
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Setting Profile') }}</div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('ducks.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text"
                                               class="form-control @error('firstname') is-invalid @enderror"
                                               name="firstname" value="{{ old('firstname', $user->firstname) }}"
                                               required autocomplete="firstname" autofocus>

                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text"
                                               class="form-control @error('lastname') is-invalid @enderror"
                                               name="lastname" value="{{ old('lastname', $user->lastname) }}" required
                                               autocomplete="lastname" autofocus>

                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('My Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" value="" required autocomplete="password" autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newpassword"
                                           class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="newpassword" type="password"
                                               class="form-control @error('newpassword') is-invalid @enderror"
                                               name="newpassword" value="" required autocomplete="newpassword"
                                               autofocus>

                                        @error('newpassword')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newpassword_confirmation"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm password') }}</label>

                                    <div class="col-md-6">
                                        <input id="newpassword_confirmation" type="password"
                                               class="form-control @error('newpassword_confirmation') is-invalid @enderror"
                                               name="newpassword_confirmation" value="" required autocomplete="newpassword_confirmation"
                                               autofocus>

                                        @error('confirmpassword')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Modify') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
