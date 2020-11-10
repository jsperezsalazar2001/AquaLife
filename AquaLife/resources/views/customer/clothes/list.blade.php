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
                @if(!empty($data["clothes"]))
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
                @else
                    <p>{{ __('clothes.error') }}</p>
                @endif
                <form action='{{ $data["partner_shop_link"] }}' target="_blank">
                    <button type="submit" class="btn btn-primary">{{ __('clothes.visit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


