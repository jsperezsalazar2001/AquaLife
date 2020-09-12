@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-align-justify"></i>{{ __('fish_list.title') }}</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('fish_list.id') }}</th>
                            <th scope="col">{{ __('fish_list.name') }}</th>
                            <th scope="col">{{ __('fish_list.price') }}</th>
                            <th scope="col">{{ __('fish_list.about') }} <i class="fa fa-info-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["fish"] as $fish)
                        <tr>
                            <td>
                                @if($loop->index < 2) <b>{{ $fish->getId() }}</b>
                                    @else
                                    {{ $fish->getId() }}
                                    @endif
                            </td>
                            <td>{{ $fish->getName() }}</td>
                            <td>{{ $fish->getPrice() }}</td>
                            <td><a href="{{ route('admin.fish.show', ['id'=>$fish->getId()]) }}"> {{ __('fish_list.more') }} <strong>{{ $fish->getName() }}</strong></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection