@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["fish"]["name"] }}</div>

                <div class="card-body">
                    <b>Fish name:</b> {{ $data["fish"]["name"] }}<br />
                    <b>Fish species:</b> {{ $data["fish"]["species"] }}<br />
                    <b>Fish family:</b> {{ $data["fish"]["family"] }}<br />
                    <b>Fish color:</b> {{ $data["fish"]["color"] }}<br />
                    <b>Fish price:</b> {{ $data["fish"]["price"] }}<br />
                    <b>Fish size:</b> {{ $data["fish"]["size"] }}<br />
                    <b>Fish temperament:</b> {{ $data["fish"]["temperament"] }}<br /><br />
                    <form method="POST" action="{{ route('fish.delete') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['fish']->getId() }}" />
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection