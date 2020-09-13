<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('fish_list.filter_by') }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('customer.fish.list_by', ['value'=>'Passive']) }}">{{ __('fish_list.filter.passive') }}</a>
                    <a class="dropdown-item" href="{{ route('customer.fish.list_by', ['value'=>'Agressive']) }}">{{ __('fish_list.filter.agressive') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('customer.fish.list') }}">{{ __('fish_list.filter.wo_filter') }}</a>
                </div>
            </div><br /><br />
            @if(sizeof($data["fish"]) < 1)
                <div class="card-deck justify-content-center">
                    <div class="alert alert-primary" role="alert" align="center">
                        {{ __('fish_list.no_fish') }}
                    </div>
                </div>
            @else
                @foreach($data["fish"] as $fish)
                    @if($loop->index == 0)
                    <div class="card-deck">
                    @endif
                    @if(($loop->index != 0) && ($loop->index)%3 == 0)
                    </div><br />
                    @if(($loop->index) != sizeof($data["fish"]))
                    <div class="card-deck">
                    @endif
                    @endif
                        <div class="card">
                            <img src="{{ asset('/images/'.$fish->getImage()) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $fish->getName() }}</h5>
                                <p class="card-text"><strong>{{ __('fish_show.color') }}</strong> {{ $fish->getColor() }}</p>
                                <p class="card-text"><strong>{{ __('fish_show.size') }}</strong> {{ $fish->getSize() }}</p>
                                <p class="card-text"><strong>{{ __('fish_show.species') }}</strong> {{ $fish->getSpecies() }}</p>
                                <p class="card-text"><strong>{{ __('fish_show.family') }}</strong> {{ $fish->getFamily() }}</p>
                                <p class="card-text"><strong>{{ __('fish_show.price') }}</strong> {{ $fish->getPrice() }}</p>
                                @if($fish->getInStock() > 0)
                                <p class="card-text green-color">{{ __('fish_list.in_stock') }}</p>
                                @else
                                <p class="card-text red-color">{{ __('fish_list.sold_out') }}</p>
                                @endif
                                <form method="POST" action="{{ route('customer.wishList.add') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id" value="{{ $fish->getId() }}" />
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-star"></i> {{ __('fish_list.favorite') }}</button>
                                        </div>
                                    </div>
                                </form><br/>
                                <form method="POST" action="{{ route('customer.fish.add-to-cart',['id'=> $fish->getId(), 'type' => 'fish']) }}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="number" class="form-control" name="quantity" value="1" step="1" min="1" max="99999999"/>
                                            <input type="hidden" name="id" value="{{ $fish->getId() }}" />
                                        </div>
                                        <button type="submit" class="btn btn-info">{{ __('fish_list.buy') }} <i class="fa fa-shopping-cart"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $fish->getTemperament() }}</small>
                            </div>
                        </div>
                    @if(($loop->index + 1) == sizeof($data["fish"]))
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection