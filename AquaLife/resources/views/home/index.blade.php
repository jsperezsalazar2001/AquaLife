<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-transparent welcome-div">
            <div class="col-12">
                <img src="{{ asset('/logos/logo_03.png') }}" class="card-img-top">
                <h1 class="display-4 welcome" align="center"><strong>{{ __('home.welcome') }}</strong></h1>
            </div>
        @include('util.message')
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $error }}</strong>
                </div>
            @endforeach
        @endif
        </div>
    </div>
</div>
@endsection
