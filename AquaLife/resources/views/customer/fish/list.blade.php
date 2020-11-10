<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<button class="btn btn-info col-1" onclick="topFunction()" id="goToTopBtn" title="Go to top"><i class="fa fa-arrow-up"></i> {{__('navigation.go_to_top')}}</button>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('util.message')
            @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
            @endif
            
            <div class="alert alert-info col-12" align="center">
                <i class="fas fa-cloud"></i> {{$data["information"][0]["temperature"]}} {{ __('fish_list.city')}} {{ $data["information"][0]["city"] }}
            </div>
           
            <br>
            <div class="row">
                <div class="btn-group col">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('fish_list.filter_by_temp') }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('customer.fish.list_by_temperament', ['value'=>'Passive']) }}">{{ __('fish_list.filter.passive') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.fish.list_by_temperament', ['value'=>'Agressive']) }}">{{ __('fish_list.filter.agressive') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('customer.fish.list') }}">{{ __('fish_list.filter.wo_filter') }}</a>
                    </div>
                </div>
                <div class="btn-group col">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('fish_list.filter_by_size') }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('customer.fish.list_by_size', ['value'=>'Small']) }}">{{ __('fish_list.filter.small') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.fish.list_by_size', ['value'=>'Medium']) }}">{{ __('fish_list.filter.medium') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.fish.list_by_size', ['value'=>'Large']) }}">{{ __('fish_list.filter.large') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('customer.fish.list') }}">{{ __('fish_list.filter.wo_filter') }}</a>
                    </div>
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
                        <div class="card" align="center">
                            <img src="{{ asset('/images/'.$fish->getImage()) }}" class="card-img-top">
                            <div class="card-body">
                                <hr/><h5 class="card-title">{{ $fish->getName() }}</h5><hr/>
                                <div class="row">
                                    <p class="card-text col-6"><strong>{{ __('fish_show.color') }}</strong><br/> {{ $fish->getColor() }}</p>
                                    <p class="card-text col-6"><strong>{{ __('fish_show.size') }}</strong><br/> {{ $fish->getSize() }}</p>
                                </div><hr/>
                                <div class="row">
                                    <p class="card-text col-6"><strong>{{ __('fish_show.temperament') }}</strong><br/> {{ $fish->getTemperament() }}</p>
                                    <p class="card-text col-6"><strong>{{ __('fish_show.price') }}</strong><br/> {{ $fish->getPrice() }}</p>
                                </div><hr/>
                                @if($fish->getInStock() > 0)
                                <p class="card-text green-color">{{ __('fish_list.in_stock') }}</p>
                                @else
                                <p class="card-text red-color">{{ __('fish_list.sold_out') }}</p>
                                @endif
                                <form method="GET" action="{{ route('customer.fish.match', ['id'=>$fish->getId(),'temperament'=>$fish->getTemperament()]) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="id"/>
                                            <button type="submit" class="btn btn-primary col-12"><i class="fa fa-anchor" aria-hidden="true"></i> {{ __('fish_list.match') }}</button>
                                        </div>
                                    </div>
                                </form><br/>
                                <form method="POST" action="{{ route('customer.wish_list.add') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="id" value="{{ $fish->getId() }}" />
                                            @foreach ($data["notFishWishList"] as $notFish)
                                                @if($notFish->getId() ==$fish->getId())
                                                <button type="submit" class="btn btn-warning col-12"><i class="fa fa-star"></i> {{ __('fish_list.favorite') }}</button>
                                                @endif
                                            @endforeach 
                                        </div>
                                    </div>
                                </form><br/>
                                <form method="POST" action="{{ route('customer.fish.add-to-cart',['id'=> $fish->getId(), 'type' => 'fish']) }}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" name="quantity" value="1" step="1" min="1" max="{{ $fish->getInStock() }}" {{ $fish->getInStock() > 0 ? '' : 'disabled' }} />
                                            <input type="hidden" name="id" value="{{ $fish->getId() }}" {{ $fish->getInStock() > 0 ? '' : 'disabled' }} />
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-info col-12" {{ $fish->getInStock() > 0 ? '' : 'disabled' }} > {{ __('fish_list.buy') }} <i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $fish->getTemperament() }} - </small>
                                <small class="text-muted">{{ $fish->getSize() }}</small>
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