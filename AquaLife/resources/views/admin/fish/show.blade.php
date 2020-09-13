@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["fish"]->getName() }}</div>

                <div class="card-body">
                    @if(strlen($data['fish']->getImage()) < 3)
                        <img class="show_image" src="{{ asset('/images/noavailable_img.png')}}"><br />
                    @else
                        <img class="show_image" src="{{ asset('/images/'.$data['fish']->getImage()) }}"><br />
                    @endif
                    <b>{{ __('fish_show.name') }}</b> {{ $data["fish"]->getName() }}<br />
                    <b>{{ __('fish_show.species') }} </b> {{ $data["fish"]->getSpecies() }}<br />
                    <b>{{ __('fish_show.family') }} </b> {{ $data["fish"]->getFamily() }}<br />
                    <b>{{ __('fish_show.color') }} </b> {{ $data["fish"]->getColor() }}<br />
                    <b>{{ __('fish_show.price') }} </b> {{ $data["fish"]->getPrice() }}<br />
                    <b>{{ __('fish_show.size') }} </b> {{ $data["fish"]->getSize() }}<br />
                    <b>{{ __('fish_show.temperament') }}</b> {{ $data["fish"]->getTemperament() }}<br />
                    <b>{{ __('fish_show.stock') }} </b> {{ $data["fish"]->getInStock() }}<br /><br /> 
                    <div class="row row-cols-3">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.fish.delete') }}">
                                 @csrf
                                <input type="hidden" name="id" value="{{ $data['fish']->getId() }}" />
                             <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> {{ __('fish_show.delete') }}</button>
                            </form>
                        </div>
                        <div class="col">
                        <form method="GET" action="{{ route('admin.fish.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['fish']->getId() }}" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('fish_show.update') }}</button>
                            </form>
                        </div>
                        <div class="col-7"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection