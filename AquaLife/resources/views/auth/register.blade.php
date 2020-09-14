<!-- Created by: Daniel Felipe Gómez Martínez -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('user_create.title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('user_create.label.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('user_create.input.name') }}"name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_user" class="col-md-4 col-form-label text-md-right">{{ __('user_create.label.address') }}</label>

                            <div class="col-md-6">
                                <input id="address_user" type="text" class="form-control @error('address_user') is-invalid @enderror" placeholder="{{ __('user_create.input.address') }}" name="address_user" value="{{ old('address_user') }}" required autocomplete="address_user" autofocus>

                                @error('addressUser')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('user_create.label.email_address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('user_create.input.email_address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <small id="priceHelpBlock" class="form-text text-muted">{{ __('user_create.label.confirm_email_address') }}</small><br />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('user_create.label.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('user_create.input.password') }}" name="password" required autocomplete="new-password">
                                <small id="priceHelpBlock" class="form-text text-muted">{{ __('user_create.label.passwordHB') }}</small><br />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('user_create.label.confirm_password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('user_create.input.confirm_password') }}" required autocomplete="new-password">
                                <small id="priceHelpBlock" class="form-text text-muted">{{ __('user_create.label.passwordHB') }}</small><br />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('user_create.create') }}
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
