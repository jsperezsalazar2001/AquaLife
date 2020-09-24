<!-- Created by: Daniel Felipe Gómez Martínez -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["user"]->getName() }}</div>

                <div class="card-body">
                    <b>{{ __('user_show.address') }}:</b> {{ $data["user"]->getAddressUser() }}<br />
                    <b>{{ __('user_show.email') }}:</b> {{ $data["user"]->getEmail() }}<br />
                    <b>{{ __('user_show.role') }}:</b> {{ $data["user"]->getRole() }}<br /><br />
                </div>

                <div class="col">
                    <form method="GET" action="{{ route('user.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['user']->getId() }}" />
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('user_show.update') }}</button>
                        </form>
                </div><br>
            </div>
        </div>
    </div>
</div>
@endsection