<!-- Created by: Daniel Felipe Gómez Martínez -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["user"]["name"] }}</div>

                <div class="card-body">
                    <b>User address:</b> {{ $data["user"]["addressUser"] }}<br />
                    <b>User email:</b> {{ $data["user"]["email"] }}<br />
                    <b>User role:</b> {{ $data["user"]["role"] }}<br /><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection