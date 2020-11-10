<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.fish.show', $data["fish"]) }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" align="center">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["fish"]->getName() }}</div>

                <div class="card-body">
                    @if(strlen($data['fish']->getImage()) < 3)
                        <img class="show_image" src="{{ asset('/images/noavailable_img.png')}}"><br />
                    @else
                        <img class="show_image" src="{{ asset('/images/'.$data['fish']->getImage()) }}"><br />
                    @endif
                    <hr/>
                    <div class="row">
                        <div class="col-3">
                            <b>{{ __('fish_show.name') }}</b><br /> {{ $data["fish"]->getName() }}<br />
                        </div>
                        <div class="col-3">
                            <b>{{ __('fish_show.species') }} </b><br /> {{ $data["fish"]->getSpecies() }}<br />
                        </div>
                        <div class="col-3">
                            <b>{{ __('fish_show.family') }} </b><br /> {{ $data["fish"]->getFamily() }}<br />
                        </div>
                        <div class="col-3">
                            <b>{{ __('fish_show.color') }} </b><br /> {{ $data["fish"]->getColor() }}<br />
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-3">
                            <b>{{ __('fish_show.price') }} </b><br /> {{ $data["fish"]->getPrice() }}<br />
                        </div>
                        <div class="col-3">
                            <b>{{ __('fish_show.size') }} </b><br /> {{ $data["fish"]->getSize() }}<br />
                        </div>
                        <div class="col-3">
                            <b>{{ __('fish_show.temperament') }}</b><br /> {{ $data["fish"]->getTemperament() }}<br />
                        </div>
                        <div class="col-3">
                            <b>{{ __('fish_show.stock') }} </b><br /> {{ $data["fish"]->getInStock() }}<br /><br /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <form method="GET" action="{{ route('admin.fish.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['fish']->getId() }}" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('fish_show.update') }}</button>
                            </form>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('admin.fish.delete') }}">
                                 @csrf
                                <input type="hidden" name="id" value="{{ $data['fish']->getId() }}" />
                             <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> {{ __('fish_show.delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

