<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-list-ul"></i> {{ __('accessory_list.title') }}</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('accessory_list.id') }}</th>
                            <th scope="col">{{ __('accessory_list.name') }}</th>
                            <th scope="col">{{ __('accessory_list.price') }}</th>
                            <th scope="col">{{ __('accessory_list.about') }} <i class="fa fa-info-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["accessories"] as $accessory)
                        <tr>
                            <td>{{ $accessory->getId() }}</td>
                            <td>{{ $accessory->getName() }}</td>
                            <td>{{ $accessory->getPrice() }}</td>
                            <td><a href="{{ route('admin.accessory.show', ['id'=>$accessory->getId()]) }}"> {{ __('accessory_list.info') }} <strong>{{ $accessory->getName() }}</strong></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
