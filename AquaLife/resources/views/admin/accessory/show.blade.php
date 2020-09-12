<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["accessory"]->getName() }}</div>

                <div class="card-body">
                    @if(strlen($data['accessory']->getImage()) < 3)
                        <img class="show_image" src="{{ asset('/images/noavailable_img.png')}}"><br />
                    @else
                        <img class="show_image" src="{{ asset('/images/'.$data['accessory']->getImage()) }}"><br />
                    @endif
                    <b>{{ __('accessory_show.name') }}:</b> {{ $data["accessory"]->getName() }}<br />
                    <b>{{ __('accessory_show.category') }}:</b> {{ $data["accessory"]->getCategory() }}<br />
                    <b>{{ __('accessory_show.description') }}:</b> {{ $data["accessory"]->getDescription() }}<br />
                    <b>{{ __('accessory_show.price') }}:</b> {{ $data["accessory"]->getPrice() }}<br /> 
                    <b>{{ __('accessory_show.stock') }}:</b> {{ $data["accessory"]->getInStock() }}<br /><br /> 
                    <form method="POST" action="{{ route('admin.accessory.delete') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['accessory']->getId() }}" />
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> {{ __('accessory_show.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
