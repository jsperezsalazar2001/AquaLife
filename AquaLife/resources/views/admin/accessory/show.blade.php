<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.accessory.show', $data["accessory"]) }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" align="center">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["accessory"]->getName() }}</div>

                <div class="card-body">
                    @if(strlen($data['accessory']->getImage()) < 3)
                        <img class="show_image" src="{{ asset('/images/noavailable_img.png')}}"><br />
                    @else
                        <img class="show_image" src="{{ asset('/images/'.$data['accessory']->getImage()) }}"><br />
                    @endif
                    <hr/>
                    <div class="row">
                        <div class="col-4">
                            <b>{{ __('accessory_show.name') }}</b><br /> {{ $data["accessory"]->getName() }}<br />
                        </div>
                        <div class="col-4">
                            <b>{{ __('accessory_show.category') }}</b><br /> {{ $data["accessory"]->getCategory() }}<br />
                        </div>
                        <div class="col-4">
                            <b>{{ __('accessory_show.description') }}</b><br /> {{ $data["accessory"]->getDescription() }}<br />
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-4">
                            <b>{{ __('accessory_show.price') }}</b><br /> {{ $data["accessory"]->getPrice() }}<br /> 
                        </div>
                        <div class="col-4">
                            <b>{{ __('accessory_show.stock') }}</b><br /> {{ $data["accessory"]->getInStock() }}<br /><br />
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-12">
                            <form method="GET" action="{{ route('admin.accessory.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['accessory']->getId() }}" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('accessory_show.update') }}</button>
                            </form>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-12">
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
    </div>
</div>
@endsection
