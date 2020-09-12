<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                            @endif
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id" value="{{ $accessory->getId() }}" />
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-star"></i> {{ __('accessory_show.favorite') }}</button>
                                    </div>
                                </div>
                            </form><br/>
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" name="quantity" value="1" step="1" min="1" max="99999999"/>
                                        <input type="hidden" name="id" value="{{ $accessory->getId() }}" />
                                    </div>
                                    <button type="submit" class="btn btn-info">{{ __('accessory_show.buy') }} <i class="fa fa-shopping-cart"></i></button>
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
        </div>
    </div>
</div>
@endsection