
<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<button class="btn btn-info col-1" onclick="topFunction()" id="goToTopBtn" title="Go to top"><i class="fa fa-arrow-up"></i> {{__('navigation.go_to_top')}}</button>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
            @endif

            @if(!empty($data["fish"]) || !empty($data["accessories"]))
                <div class="card" align="center">
                    <div class="card-header"><i class="fa fa-shopping-cart"></i> {{ __('cart.name') }}</div>
                    <div class="card-body">
                    @if(!empty($data["fish"]))
                        <h4 class="card-title" align="center">{{ __('fish.title_plural') }}</h4><br />
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
                                        <hr/><h5 class="card-title">{{ $fish->getName() }}</h5><hr/>
                                        <div class="row">
                                            <p class="card-text col-6"><strong>{{ __('fish_show.color') }}</strong><br/> {{ $fish->getColor() }}</p>
                                            <p class="card-text col-6"><strong>{{ __('fish_show.size') }}</strong><br/> {{ $fish->getSize() }}</p>
                                        </div><hr/>
                                        <div class="row">
                                            <p class="card-text col-6"><strong>{{ __('fish_show.species') }}</strong><br/> {{ $fish->getSpecies() }}</p>
                                            <p class="card-text col-6"><strong>{{ __('fish_show.family') }}</strong><br/> {{ $fish->getFamily() }}</p>
                                        </div><hr/>
                                        <p class="card-text col-12"><strong>{{ __('fish_show.price') }}</strong><br/> {{ $fish->getPrice() }}</p>
                                        @if($fish->getInStock() > 0)
                                        <p class="card-text green-color">{{ __('fish_list.in_stock') }}</p>
                                        @else
                                        <p class="card-text red-color">{{ __('fish_list.sold_out') }}</p>
                                        @endif
                                        <form method="POST" action="{{ route('customer.remove-from-cart',['id'=> $fish->getId(), 'type' => 'fish']) }}" >
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-5">
                                                    <input type="number" class="form-control col-12" name="quantity" value="{{ Session::get('fish')[$fish->getId()] }}" step="1" min="1" max="99999999" disabled/>
                                                    <input type="hidden" name="id" value="{{ $fish->getId() }}" />
                                                </div>
                                                <div class="col-7">
                                                    <button type="submit" class="btn btn-danger col-12">{{ __('fish_list.remove') }} <i class="fa fa-shopping-cart"></i></button>
                                                </div>
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
                    @if(!empty($data["accessories"]))
                    <br />
                    <h4 class="card-title" align="center">{{ __('accessory.title_plural') }}</h4><br />
                        @foreach($data["accessories"] as $accessory)
                            @if($loop->index == 0)
                            <div class="card-deck">
                            @endif
                            @if(($loop->index != 0) && ($loop->index)%3 == 0)
                            </div><br />
                            @if(($loop->index) != sizeof($data["accessories"]))
                            <div class="card-deck">
                            @endif
                            @endif
                                <div class="card" align="center">
                                    <img src="{{ asset('/images/'.$accessory->getImage()) }}" class="card-img-top">
                                    <div class="card-body">
                                        <hr/><h5 class="card-title">{{ $accessory->getName() }}</h5><hr/>
                                        <div class="row">
                                            <p class="card-text col-6"><strong>{{ __('accessory_list.description') }}</strong><br/> {{ $accessory->getDescription() }}</p>
                                            <p class="card-text col-6"><strong>{{ __('accessory_list.price') }}</strong><br/> {{ $accessory->getPrice() }}</p>
                                        </div><hr/>
                                        @if($accessory->getInStock() > 0)
                                        <p class="card-text green-color">{{ __('accessory_list.in_stock') }}</p>
                                        @else
                                        <p class="card-text red-color">{{ __('accessory_list.sold_out') }}</p>
                                        @endif<br/>
                                        <form method="POST" action="{{ route('customer.remove-from-cart',['id'=> $accessory->getId(), 'type' => 'accessory']) }}" >
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-5">
                                                    <input type="number" class="form-control col-12" name="quantity" value="{{ Session::get('accessory')[$accessory->getId()] }}" step="1" min="1" max="99999999" disabled/>
                                                    <input type="hidden" name="id" value="{{ $accessory->getId() }}" />
                                                </div>
                                                <div class="col-7">
                                                    <button type="submit" class="btn btn-danger col-12">{{ __('accessory_show.remove') }} <i class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $accessory->getCategory() }}</small>
                                    </div>
                                </div>
                            @if(($loop->index + 1) == sizeof($data["accessories"]))
                            </div>
                            @endif
                        @endforeach
                        @endif
                        <br>
                        @if(!empty($data["fish"]) or !empty($data["accessories"]))
                        <form method="POST" action="{{ route('customer.cart.buy') }}">
                            @csrf
                            <div class="form-group row align-items-end" align="center">
                                    <p class="card-text col-12"><strong>{{ __('cart.total') }}</strong></p>
                                    <p class="card-text green-color col-12">{{ $data["total"] }}</p>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-6">
                                    <div class="row justify-content-center">
                                        <div class="col-12" align="center">
                                            <label for="payment_type">{{ __('cart.payment_type') }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <select class="form-control" name="payment_type">
                                                <option value="Credit card" selected>{{ __('cart.payment_options.credit') }}</option>
                                                <option value="Cash">{{ __('cart.payment_options.cash') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success col-12">{{ __('cart.buy') }} <i class="fa fa-shopping-cart"></i></button>
                                </div>
                            </div>
                        </form>
                        @endif
                        <br>
                        <hr/>
                        <div class="form-group row align-items-end">
                                <div class="col-6">
                                    <form action="{{ route('customer.fish.list') }}">
                                        <button type="submit" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{ __('navigation.go_back_to_fish_list') }}</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('customer.accessory.list') }}">
                                        <button type="submit" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{ __('navigation.go_back_to_accessory_list') }}</button>
                                    </form>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>
@endsection