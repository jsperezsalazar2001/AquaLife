<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-list-ul"></i> {{ __('clothes.title') }}</div>
                <div class="col-md-8">
                    <h4>{{ __('clothes.top5msm') }}</h1>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('clothes.name') }}</th>
                            <th scope="col">{{ __('clothes.price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["clothes"] as $article)
                        <tr>
                            <td>{{ $article['name'] }}</td>
                            <td>{{ $article['price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="http://ec2-3-89-29-196.compute-1.amazonaws.com/public/index" target="_blank">
                    <button type="submit" class="btn btn-primary">{{ __('clothes.visit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


