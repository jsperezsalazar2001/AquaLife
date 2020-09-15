
<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')

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
                <div class="card">
                    <div class="card-header"><i class="fa fa-shopping-cart"></i> {{ __('cart.name') }}</div>
                    <div class="card-body">
                    @if(!empty($data["fish"]))
                        <h4 class="card-title" align="center">{{ __('fish_create.navbar_title') }}</h4><br />
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
                                        <form method="POST" action="{{ route('customer.remove-from-cart',['id'=> $fish->getId(), 'type' => 'fish']) }}" >
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <input type="number" class="form-control" name="quantity" value="{{ Session::get('fish')[$fish->getId()] }}" step="1" min="1" max="99999999" disabled/>
                                                    <input type="hidden" name="id" value="{{ $fish->getId() }}" />
                                                </div>
                                                <button type="submit" class="btn btn-danger">{{ __('fish_list.remove') }} <i class="fa fa-shopping-cart"></i></button>
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
                    <h4 class="card-title" align="center">{{ __('accessory_list.title') }}</h4><br />
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
                                <div class="card">
                                    <img src="{{ asset('/images/'.$accessory->getImage()) }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $accessory->getName() }}</h5>
                                        <p class="card-text"><strong>{{ __('accessory_list.description') }}:</strong> {{ $accessory->getDescription() }}</p>
                                        <p class="card-text"><strong>{{ __('accessory_list.price') }}:</strong> {{ $accessory->getPrice() }}</p>
                                        @if($accessory->getInStock() > 0)
                                        <p class="card-text green-color">{{ __('accessory_list.in_stock') }}</p>
                                        @else
                                        <p class="card-text red-color">{{ __('accessory_list.sold_out') }}</p>
                                        @endif<br/>
                                        <form method="POST" action="{{ route('customer.remove-from-cart',['id'=> $accessory->getId(), 'type' => 'accessory']) }}" >
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                <input type="number" class="form-control" name="quantity" value="{{ Session::get('accessory')[$accessory->getId()] }}" step="1" min="1" max="99999999" disabled/>
                                                    <input type="hidden" name="id" value="{{ $accessory->getId() }}" />
                                                </div>
                                                <button type="submit" class="btn btn-danger">{{ __('accessory_show.remove') }} <i class="fa fa-shopping-cart"></i></button>
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
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>
@endsection