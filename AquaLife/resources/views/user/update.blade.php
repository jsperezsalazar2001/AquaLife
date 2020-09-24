<!-- Created by: Daniel Felipe Gomez Martinez -->
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('user_update.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('user.update_save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['user']->getId() }}" />
                    <div class="form-row">
                        <div class="col">
                            <label for="ph_lr"><strong>{{ __('user_update.input.name') }}</strong></label><br />
                            <input type="text" class="form-control" name="name" value="{{ $data['user']->getName() }}" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('user_update.label.name') }}</small><br />
                        </div>

                        <div class="col">
                            <label for="ph_lr"><strong>{{ __('user_update.input.address') }}</strong></label><br />
                            <input type="text" class="form-control" name="address_user" value="{{ $data['user']->getAddressUser() }}" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('user_update.label.address') }}</small><br />
                        </div>
                    </div><br />
                    <div class="form-row">
                        <div class="col">
                            <label for="ph_lr"><strong>{{ __('user_update.input.email_address') }}</strong></label><br />
                            <input type="text" class="form-control" name="email" value="{{ $data['user']->getEmail() }}" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('user_update.label.confirm_email_address') }}</small><br />
                        </div>
                    </div><br/>
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="{{ __('user_update.update') }}" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection